<?php

declare(strict_types=1);

namespace App\Http\Auth\Login;

use Tempest\Validation\Rule;

class PasswordMismatch implements Rule
{
    #[\Override]
    public function isValid($value): bool
    {
        return false;
    }

    public function message(): string
    {
        return 'password is incorrect.';
    }
}
