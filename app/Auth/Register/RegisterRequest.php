<?php

declare(strict_types=1);

namespace App\Auth\Register;

use Tempest\Http\IsRequest;
use Tempest\Http\Request;
use Tempest\Validation\Rules\HasLength;
use Tempest\Validation\Rules\IsEmail;
use Tempest\Validation\Rules\IsNotEmptyString;

final class RegisterRequest implements Request
{
    use IsRequest;

    #[IsNotEmptyString, HasLength(min: 3, max: 100), IsEmail]
    public string $email;

    #[IsNotEmptyString, HasLength(min: 8, max: 30)]
    public string $password;
}
