<?php

declare(strict_types=1);

namespace App\Models;

use BackedEnum;
use SensitiveParameter;
use Tempest\Auth\Authentication\Authenticatable;
use Tempest\Database\Hashed;
use Tempest\Database\HasMany;
use Tempest\Database\IsDatabaseModel;
use Tempest\Database\PrimaryKey;
use Tempest\DateTime\DateTime;
use UnitEnum;

final class User implements Authenticatable
{
    use IsDatabaseModel;

    public PrimaryKey $id;
    public DateTime $created_at;
    public DateTime $updated_at;

    public function __construct(
        public string $username,
        public string $email,
        #[SensitiveParameter, Hashed]
        public string $password,
        /** @var UserPermission[] $userPermissions */
        #[HasMany(UserPermission::class)]
        public array $userPermissions = [],
    ) {
        $this->created_at = DateTime::now();
        $this->updated_at = DateTime::now();
    }

    /**
     * @param string $rowPassword The raw password, which will be encrypted as soon as it is set
     */
    public static function hashPassword(
        #[SensitiveParameter]
        string $rowPassword,
    ): string {
        return password_hash($rowPassword, PASSWORD_BCRYPT);
    }

    public function grantPermission(string|UnitEnum|Permission $permission): self
    {
        $permission = $this->resolvePermission(permission: $permission);

        UserPermission::new(user: $this, permission: $permission)->save();

        return $this->load(relations: 'userPermissions.permission');
    }

    public function revokePermission(string|UnitEnum|Permission $permission): self
    {
        $this->getPermission(permission: $permission)?->delete();

        return $this->load(relations: 'userPermissions.permission');
    }

    public function hasPermission(string|UnitEnum|Permission $permission): bool
    {
        return $this->getPermission(permission: $permission) !== null;
    }

    public function getPermission(string|UnitEnum|Permission $permission): ?UserPermission
    {
        foreach ($this->userPermissions as $userPermission) {
            if ($userPermission->permission->matches($permission)) {
                return $userPermission;
            }
        }

        return null;
    }

    private function resolvePermission(string|UnitEnum|Permission $permission): Permission
    {
        if ($permission instanceof Permission) {
            return $permission;
        }

        $name = $this->normalizePermissionName($permission);

        return $this->findOrCreatePermission($name);
    }

    private function normalizePermissionName(string|UnitEnum $permission): string
    {
        if ($permission instanceof BackedEnum) {
            return (string) $permission->value;
        }
        if ($permission instanceof UnitEnum) {
            return $permission->name;
        }

        return $permission;
    }

    private function findOrCreatePermission(string $name): Permission
    {
        $permission = Permission::find(name: $name)->first();

        if ($permission instanceof Permission) {
            return $permission;
        }

        return new Permission(name: $name)->save();
    }
}
