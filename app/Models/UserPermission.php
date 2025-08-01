<?php

declare(strict_types=1);

namespace App\Models;

use Tempest\Database\IsDatabaseModel;

final class UserPermission
{
    use IsDatabaseModel;

    public User $user;
    public Permission $permission;
}
