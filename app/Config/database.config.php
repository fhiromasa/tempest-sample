<?php

declare(strict_types=1);

use Tempest\Database\Config\MysqlConfig;

use function Tempest\env;

return new MysqlConfig(
    $host = env(key: 'DATABASE_HOST', default: 'localhost'),
    $port = env(key: 'DATABASE_PORT', default: '3306'),
    $username = env(key: 'DATABASE_USER', default: 'mysql'),
    $password = env(key: 'DATABASE_PASSWORD', default: 'mysql'),
    $database = env(key: 'DATABASE_NAME', default: 'database'),
);
