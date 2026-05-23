<?php

declare(strict_types=1);

namespace App\Trait;

use App\Models\User;

trait UnknownUserTrait
{
    public static function getUnknownUser(): User
    {
        return new User(
            username: 'Unknown',
            email: 'unknown@example.com',
            password: '',
        );
    }
}
