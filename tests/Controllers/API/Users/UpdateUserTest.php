<?php

declare(strict_types=1);

namespace Tests\Controllers\API\Users;

use App\Http\API\Users\UserController;
use Exception;
use PHPUnit\Framework\Attributes\PreCondition;
use Tempest\Http\Status;
use Tests\IntegrationTestCase;

use function Tempest\Router\uri;

class UpdateUserTest extends IntegrationTestCase
{
    private int $createdUser;

    #[PreCondition]
    protected function configure(): void
    {
        $this->database->setup();

        $resHelper = $this->http
            ->post(uri: uri([UserController::class, 'createUser']), body: [
                'username' => 'test update user',
                'email' => 'update@example.com',
                'password' => 'password',
            ]);
        if ($resHelper->status !== Status::CREATED) {
            throw new Exception('Failed to create user: ' . $resHelper->status->description());
        }
        if (! is_array($resHelper->body)) {
            throw new Exception('Unexpected response body type: ' . get_debug_type($resHelper->body));
        }

        $userId = array_key_exists('id', $resHelper->body) ? (int) $resHelper->body['id'] : null;
        if (is_null($userId)) {
            throw new Exception('Unexpected response body.');
        }

        $this->createdUser = $userId;
    }

    public function test_updateUser(): void
    {
        $this->http
            ->put(
                uri: uri([UserController::class, 'updateUser'], id: $this->createdUser),
                body: [
                    'username' => 'updateduser',
                    'email' => 'updated@example.com',
                ],
            )
            ->assertStatus(Status::OK)
            ->assertJsonContains([
                'id' => $this->createdUser,
                'username' => 'updateduser',
                'email' => 'updated@example.com',
            ]);
    }
}
