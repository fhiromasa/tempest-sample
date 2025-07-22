<?php

declare(strict_types=1);

use Tempest\Database\Config\MysqlConfig;

use function Tempest\env;

return new MysqlConfig(
    $host = env('DATABASE_HOST', default: 'localhost'),
    $port = env('DATABASE_PORT', default: '3306'),
    $username = env('DATABASE_USER', default: 'mysql'),
    $password = env('DATABASE_PASSWORD', default: 'mysql'),
    $database = env('DATABASE_NAME', default: 'database'),
);
