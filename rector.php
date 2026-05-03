<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Tempest\Upgrade\Set\TempestSetList;

return RectorConfig::configure()
    ->withPaths([
        __DIR__ . '/app',
        __DIR__ . '/public',
        __DIR__ . '/tests',
    ])
    // uncomment to reach your current PHP version
    ->withPhpSets(php85: true)
    ->withSets([
        TempestSetList::TEMPEST_20,
        TempestSetList::TEMPEST_28,
        TempestSetList::TEMPEST_30,
    ])
    ->withTypeCoverageLevel(0)
    ->withDeadCodeLevel(0)
    ->withCodeQualityLevel(0);
