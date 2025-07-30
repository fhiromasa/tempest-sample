<?php

namespace App\Models;

use Tempest\Database\IsDatabaseModel;
use Tempest\Database\Table;
use Tempest\Validation\Rules\Email;
use Tempest\Validation\Rules\Length;

#[Table('users')]
final class User
{
    use IsDatabaseModel;

    public function __construct(
        #[Length(min: 2, max: 100)]
        public string $first_name,
        #[Length(min: 2, max: 100)]
        public string $last_name,
        #[Length(min: 3, max: 100), Email]
        public string $email,
    ) {
    }
}
