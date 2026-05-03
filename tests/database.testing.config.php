<?php

declare(strict_types=1);

use Tempest\Database\Config\MysqlConfig;

// use Tempest\Database\Config\PostgresConfig;

use function Tempest\env;

return new MysqlConfig(
    host: (string) env(key: 'DATABASE_HOST', default: 'database'),
    port: (string) env(key: 'DATABASE_PORT', default: '3306'),
    username: (string) env(key: 'DATABASE_USER', default: 'user'),
    password: (string) env(key: 'DATABASE_PASSWORD', default: 'password'),
    database: (string) env(key: 'DATABASE_NAME', default: 'test_database'),
);
