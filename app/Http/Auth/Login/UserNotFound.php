<?php

declare(strict_types=1);

namespace App\Http\Auth\Login;

use Tempest\Validation\Rule;

class UserNotFound implements Rule
{
    #[\Override]
    public function isValid($value): bool
    {
        return false;
    }

    public function message(): string
    {
        return 'User not found';
    }
}
