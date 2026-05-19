<?php

declare(strict_types=1);

namespace App\Http\API\Users;

use App\Repositories\UserRepository;
use Exception;
use Tempest\Http\Request;
use Tempest\Http\Responses\Json;
use Tempest\Http\Status;
use Tempest\Log\Logger;
use Tempest\Router\Delete;
use Tempest\Router\Get;
use Tempest\Router\Post;
use Tempest\Router\Put;
use Tempest\Router\Stateless;

#[Stateless]
final readonly class UserController
{
    public function __construct(
        private UserRepository $userRepo,
        private Logger $logger,
    ) {}

    /**
     * Create a new user.
     *
     * @example curl -X POST http://app.localhost:8080/api/users -d '{"username": "sample", "email": "sample@example.com", "password": "password"}'
     * @return Json {
     *   "id": 1,
     *   "username": "sample",
     *   "email": "sample@example.com",
     *   "created_at": "2026-04-01 11:26:37",
     *   "updated_at": "2026-04-01 11:26:37"
     * }
     */
    #[Post(uri: '/api/users')]
    public function createUser(CreateUserRequest $request): Json
    {
        $this->logger->debug(__METHOD__ . ' - ' . (string) json_encode($request));
        try {
            // @Todo throw exception when user already exists(key=email).
            $newUser = $this->userRepo->create($request->username, $request->email, $request->password);
        } catch (Exception $e) {
            $this->logger->alert($e->getMessage());
            return new Json(['error' => 'an error occurred'])->setStatus(Status::INTERNAL_SERVER_ERROR);
        }
        return new Json($newUser->toArray())->setStatus(Status::CREATED);
    }

    /**
     * Get a list of users.
     * @example curl -X GET http://app.localhost:8080/api/users
     * @return Json [
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
    public function getUsers(): Json
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
     * @todo validate user exist.
     * @example curl -X GET http://app.localhost:8080/api/users/{id}
     * @return Json {
     *   "id": 1,
     *   "username": "sample",
     *   "email": "sample@example.com",
     *   "created_at": "2026-04-01 11:26:37",
     *   "updated_at": "2026-04-01 11:26:37"
     * }
     */
    #[Get(uri: '/api/users/{id}')]
    public function getById(int $id): Json
    {
        try {
            $user = $this->userRepo->findById($id);
            if ($user === null) {
                throw new \Exception('User not found');
            }
            return new Json($user->toArray());
        } catch (Exception $e) {
            $this->logger->alert($e->getMessage());
            return new Json(['error' => 'an error occurred'])->setStatus(Status::NOT_FOUND);
        }
    }

    /**
     * Update a specific user.
     * @todo create nullable validation.
     * @todo validate user exist.
     * @example curl -X PUT http://app.localhost:8080/api/users/{id} -d '{"username": "update"}'
     * @return Json {
     *   "id": 1,
     *   "username": "sample",
     *   "email": "sample@example.com",
     *   "created_at": "2026-04-01 11:26:37",
     *   "updated_at": "2026-04-01 11:26:37"
     * }
     */
    #[Put(uri: '/api/users/{id}')]
    public function updateUser(int $id, Request $request): Json
    {
        try {
            $updatedUser = $this->userRepo->update(
                $id,
                (string) $request->get('username', null),
                (string) $request->get('email', null),
                (string) $request->get('password', null),
            );
        } catch (Exception $e) {
            $this->logger->alert($e->getMessage());
            return new Json(['error' => 'an error occurred'])->setStatus(Status::INTERNAL_SERVER_ERROR);
        }
        return new Json($updatedUser->toArray());
    }

    /**
     * Delete a specific user.
     * @todo validate user exist.
     * @example curl -X DELETE http://localhost:8080/api/users/1
     * @return Json Empty response
     */
    #[Delete(uri: '/api/users/{id}')]
    public function deleteUser(int $id): Json
    {
        try {
            $res = $this->userRepo->delete($id);
            if (! $res) {
                return new Json(['error' => 'user not found'])->setStatus(Status::NOT_FOUND);
            }
        } catch (Exception $e) {
            $this->logger->alert($e->getMessage());
            return new Json(['error' => 'an error occurred'])->setStatus(Status::INTERNAL_SERVER_ERROR);
        }
        return new Json()->setStatus(Status::NO_CONTENT);
    }
}
