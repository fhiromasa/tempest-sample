<?php

declare(strict_types=1);

use Tempest\Log\Channels\DailyLogChannel;

return new DailyLogChannel(
    path: __DIR__ . '/../../log/daily.log',
    maxFiles: 10,
);
