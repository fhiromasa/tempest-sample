<?php

declare(strict_types=1);

namespace App\Models;

use BackedEnum;
use SensitiveParameter;
use Tempest\Auth\Authentication\Authenticatable;
use Tempest\Database\Hashed;
use Tempest\Database\IsDatabaseModel;
use Tempest\Database\PrimaryKey;
use UnitEnum;

use function Tempest\Support\arr;

final class User implements Authenticatable
{
    use IsDatabaseModel;

    public PrimaryKey $id;

    public function __construct(
        public string $name,
        public string $email,
        #[SensitiveParameter]
        #[Hashed]
        public string $password,
        /** @var UserPermission[] $userPermissions */
        public array $userPermissions = [],
    ) {}

    /**
     * @param string $rowpassword The raw password, which will be encrypted as soon as it is set
     */
    public static function hashPassword(
        #[SensitiveParameter] string $rowPassword,
    ): string {
        return password_hash(password: $rowPassword, algo: PASSWORD_BCRYPT);
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
        return arr(input: $this->userPermissions)
            ->first(
                filter: static fn(UserPermission $userPermission) => $userPermission->permission->matches(
                    $permission,
                ),
            );
    }

    private function resolvePermission(string|UnitEnum|Permission $permission): Permission
    {
        if ($permission instanceof Permission) {
            return $permission;
        }

        $name = match (true) {
            is_string(value: $permission) => $permission,
            $permission instanceof BackedEnum => $permission->value,
            $permission instanceof UnitEnum => $permission->name,
        };

        $permission = Permission::select()
            ->whereField(field: 'name', value: $name)
            ->first();

        return $permission ?? new Permission(name: $name)->save();
    }
}
