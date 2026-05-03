<?php

declare(strict_types=1);

use Tempest\Log\Channels\AppendLogChannel;
use Tempest\Log\Channels\DailyLogChannel;
use Tempest\Log\LogConfig;

return new LogConfig(
    channels: [
        new AppendLogChannel(
            path: __DIR__ . '/../../log/project.log',
        ),
        new DailyLogChannel(
            path: __DIR__ . '/../../log/daily.log',
            maxFiles: 10,
        ),
    ],
    debugLogPath: __DIR__ . '/../../log/debug.log',
);
