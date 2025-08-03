<?php

declare(strict_types=1);

namespace Tests;

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
