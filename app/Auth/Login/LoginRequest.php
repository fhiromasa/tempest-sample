<?php

namespace App\Auth\Login;

use Tempest\Http\IsRequest;
use Tempest\Http\Request;
use Tempest\Validation\Rules\Length;

final class LoginRequest implements Request
{
    use IsRequest;

    #[Length(min: 3, max: 100)]
    public string $email;

    #[Length(min: 8, max: 30)]
    public string $password;
}
