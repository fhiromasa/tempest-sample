<?php

declare(strict_types=1);

namespace Tests\Controllers\API\Users;

use App\Http\API\Users\UserController;
use Tempest\Http\Status;
use Tests\IntegrationTestCase;

use function Tempest\Router\uri;

class CreateUserTest extends IntegrationTestCase
{
    public function test_createUser(): void
    {
        $helper = $this->http
            ->post(uri: uri([UserController::class, 'createUser']), body: [
                'username' => 'testuser',
                'email' => 'test@example.com',
                'password' => 'password',
            ]);

        $helper
            ->assertStatus(Status::CREATED)
            ->assertJsonContains([
                'username' => 'testuser',
                'email' => 'test@example.com',
            ])
            ->assertJsonHasKeys('id', 'created_at', 'updated_at');
    }
}
