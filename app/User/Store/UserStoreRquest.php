<?php

namespace App\User\Store;

use Tempest\Http\IsRequest;
use Tempest\Http\Request;
use Tempest\Validation\Rules\Email;
use Tempest\Validation\Rules\Length;

final class UserStoreRquest implements Request
{
    use IsRequest;

    #[Length(min: 2, max: 100)]
    public string $name;

    #[Length(min: 3, max: 100), Email]
    public string $email;
}
