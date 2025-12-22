<?php

declare(strict_types=1);

namespace App\Auth\Login;

use Tempest\Http\IsRequest;
use Tempest\Http\Request;
use Tempest\Validation\Rules\HasLength;

final class LoginRequest implements Request
{
    use IsRequest;

    #[HasLength(min: 3, max: 100)]
    public string $email;

    #[HasLength(min: 8, max: 30)]
    public string $password;
}
