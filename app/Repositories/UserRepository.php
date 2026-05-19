<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\User;
use SensitiveParameter;
use Tempest\Database\PrimaryKey;
use Tempest\DateTime\DateTime;

class UserRepository
{
    public static function create(
        string $username,
        string $email,
        #[SensitiveParameter]
        string $password,
    ): User {
        $user = new User($username, $email, $password);
        $user->save();

        return $user;
    }

    /**
     * Get a list of users.
     *
     * @return User[]
     */
    public function getUsers(int $limit = 10): array
    {
        return User::select()->limit($limit)->all();
    }

    public function findById(string|int|PrimaryKey $id): ?User
    {
        return User::findById($id);
    }

    /**
     * @throws \Exception
     */
    public function update(
        string|int|PrimaryKey $id,
        string $username = '',
        string $email = '',
        #[SensitiveParameter]
        string $password = '',
    ): User {
        $user = User::findById($id);
        if ($user === null) {
            throw new \Exception('User not found');
        }

        if ($username !== '') {
            $user->username = $username;
            $user->updated_at = DateTime::now();
        }
        if ($email !== '') {
            $user->email = $email;
            $user->updated_at = DateTime::now();
        }
        if ($password !== '') {
            $user->password = $password;
            $user->updated_at = DateTime::now();
        }
        $user->save();
        return $user;
    }

    /**
     * @throws \Exception
     */
    public function delete(string|int|PrimaryKey $id): bool
    {
        $user = User::findById($id);
        if ($user === null) {
            throw new \Exception('User not found');
        }
        $user->delete();
        return true;
    }
}
