<?php

declare(strict_types=1);

namespace App\Models;

use SensitiveParameter;
use Tempest\Auth\CanAuthenticate;
use Tempest\Auth\CanAuthorize;
use Tempest\Database\IsDatabaseModel;
use Tempest\Database\Table;
use Tempest\Validation\Rules\Length;
use UnitEnum;

use function Tempest\Support\arr;

#[Table('users')]
final class User implements CanAuthenticate, CanAuthorize
{
    use IsDatabaseModel;

    public string $password;
    #[Length(min: 2, max: 100)]
    public string $first_name;
    #[Length(min: 2, max: 100)]
    public string $last_name;

    public function __construct(
        public string $name,
        public string $email,
        /** @var UserPermission[] $userPermissions */
        public array $userPermissions = [],
    ) {}

    /**
     * @param string $password The raw password, which will be encrypted as soon as it is set
     */
    public function setPassword(#[SensitiveParameter] string $password): self
    {
        $this->password = password_hash(password: $password, algo: PASSWORD_BCRYPT);

        return $this;
    }

    public function grantPermission(string|UnitEnum|Permission $permission): self
    {
        $permission = $this->resolvePermission(permission: $permission);

        UserPermission::new(
            user: $this,
            permission: $permission,
        )->save();

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
            ->first(filter: fn (UserPermission $userPermission) => $userPermission->permission->matches($permission));
    }

    private function resolvePermission(string|UnitEnum|Permission $permission): Permission
    {
        if ($permission instanceof Permission) {
            return $permission;
        }

        $name = match (true) {
            is_string(value: $permission) => $permission,
            $permission instanceof \BackedEnum => $permission->value,
            $permission instanceof UnitEnum => $permission->name,
        };

        $permission = Permission::select()->whereField(field: 'name', value: $name)->first();

        return $permission ?? new Permission(name: $name)->save();
    }
}
