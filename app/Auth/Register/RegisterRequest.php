<?php

declare(strict_types=1);

namespace App\Auth\Register;

use Tempest\Http\IsRequest;
use Tempest\Http\Request;
use Tempest\Validation\Rules\Email;
use Tempest\Validation\Rules\Length;
use Tempest\Validation\Rules\NotEmpty;

final class RegisterRequest implements Request
{
    use IsRequest;

    #[NotEmpty, Length(min: 3, max: 100), Email]
    public string $email;

    #[NotEmpty, Length(min: 8, max: 30)]
    public string $password;
}
