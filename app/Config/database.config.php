<?php

declare(strict_types=1);

use Tempest\Database\Config\MysqlConfig;

// use Tempest\Database\Config\PostgresConfig;

use function Tempest\env;

return new MysqlConfig(
    host: env(key: 'DATABASE_HOST', default: 'database'),
    port: env(key: 'DATABASE_PORT', default: '3306'),
    username: env(key: 'DATABASE_USER', default: 'user'),
    password: env(key: 'DATABASE_PASSWORD', default: 'password'),
    database: env(key: 'DATABASE_NAME', default: 'database'),
);

// new PostgresConfig(
//     $host = env(key: 'DATABASE_HOST', default: 'localhost'),
//     $port = env(key: 'DATABASE_PORT', default: '5432'),
//     $username = env(key: 'DATABASE_USER', default: 'postgres'),
//     $password = env(key: 'DATABASE_PASSWORD', default: 'postgres'),
//     $database = env(key: 'DATABASE_NAME', default: 'database'),
// );
