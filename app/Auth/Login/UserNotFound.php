<?php

declare(strict_types=1);

namespace App\Auth\Login;

use Tempest\Validation\Rule;

class UserNotFound implements Rule
{
    public function isValid($value): bool
    {
        return false;
    }

    public function message(): string
    {
        return 'User not found';
    }
}
