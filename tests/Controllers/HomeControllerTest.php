<?php

declare(strict_types=1);

namespace Tests\Controllers;

use Tests\IntegrationTestCase;

/**
 * @internal
 */
final class HomeControllerTest extends IntegrationTestCase
{
    public function test_index(): void
    {
        $this->http
            ->get(uri: '/')
            ->assertOk()
            ->assertSee(search: 'Tempest');
    }
}
