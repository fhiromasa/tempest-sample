<?php

declare(strict_types=1);

namespace App\Http\API\Users;

use App\Repositories\UserRepository;
use Tempest\Http\Response;
use Tempest\Http\Responses\Json;
use Tempest\Http\Responses\NotFound;
use Tempest\Router\Get;

final class UserController
{
    public function __construct(
        private UserRepository $userRepo,
    ) {}

    /**
     * Get a list of users.
     * @sample [
     *   {
     *     "id": 1,
     *     "username": "sample",
     *     "email": "sample@example.com",
     *     "created_at": "2026-04-01 11:26:37",
     *     "updated_at": "2026-04-01 11:26:37"
     *   },
     * ]
     */
    #[Get(uri: '/api/users')]
    public function __invoke(): Json
    {
        $users = $this->userRepo->getUsers();

        $data = [];
        foreach ($users as $user) {
            $data[] = $user->toArray();
        }
        return new Json($data);
    }

    /**
     * Get a list of users.
     * @sample {
     *   "id": 1,
     *   "username": "sample",
     *   "email": "sample@example.com",
     *   "created_at": "2026-04-01 11:26:37",
     *   "updated_at": "2026-04-01 11:26:37"
     * }
     */
    #[Get(uri: '/api/users/{id}')]
    public function getById(int $id): Json|Response
    {
        $user = $this->userRepo->getUserById($id);

        if (is_null($user)) {
            return new NotFound();
        }

        return new Json($user->toArray());
    }
}
