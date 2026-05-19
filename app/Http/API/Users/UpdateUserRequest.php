<?php

declare(strict_types=1);

namespace App\Http\API\Users;

use Tempest\Http\IsRequest;
use Tempest\Http\Request;
use Tempest\Http\SensitiveField;
use Tempest\Validation\Rules\HasLength;
use Tempest\Validation\Rules\IsEmail;

final class UpdateUserRequest implements Request
{
    use IsRequest;

    #[HasLength(min: 3, max: 100)]
    public ?string $username = null;

    #[HasLength(min: 3, max: 100), IsEmail]
    public ?string $email = null;

    #[HasLength(min: 3, max: 100), SensitiveField]
    public ?string $password = null;
}
