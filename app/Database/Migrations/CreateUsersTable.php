<?php

declare(strict_types=1);

namespace App\Database\Migrations;

use Tempest\Database\MigratesDown;
use Tempest\Database\MigratesUp;
use Tempest\Database\QueryStatements\CreateTableStatement;
use Tempest\Database\QueryStatements\DropTableStatement;

final class CreateUsersTable implements MigratesUp, MigratesDown
{
    public private(set) string $name = '0000-00-00_create_users_table';

    #[\Override]
    public function up(): CreateTableStatement
    {
        return new CreateTableStatement(tableName: 'users')
            ->primary()
            ->varchar(name: 'username', length: 255)
            ->varchar(name: 'email', length: 255)
            ->varchar(name: 'password', length: 255)
            ->datetime(name: 'created_at')
            ->datetime(name: 'updated_at');
    }

    #[\Override]
    public function down(): DropTableStatement
    {
        return new DropTableStatement(tableName: 'users');
    }
}
