<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\User;
use SensitiveParameter;

class UserRepository
{
    public static function create(
        string $username,
        string $email,
        #[SensitiveParameter] string $password,
    ): User {
        $user = new User($username, $email, $password);
        $user->save();

        return $user;
    }
}
