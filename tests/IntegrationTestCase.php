<?php

declare(strict_types=1);

namespace Tests;

use Override;
use Tempest\Framework\Testing\IntegrationTest;

abstract class IntegrationTestCase extends IntegrationTest
{
    #[Override]
    protected string $root = __DIR__ . '/../';
}
