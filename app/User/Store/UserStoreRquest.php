<?php

declare(strict_types=1);

namespace App\User\Store;

use Tempest\Http\IsRequest;
use Tempest\Http\Request;
use Tempest\Validation\Rules\Email;
use Tempest\Validation\Rules\Length;

final class UserStoreRquest implements Request
{
    use IsRequest;

    #[Length(min: 2, max: 100)]
    public string $first_name;

    #[Length(min: 2, max: 100)]
    public string $last_name;

    #[Length(min: 3, max: 100), Email]
    public string $email;
}
