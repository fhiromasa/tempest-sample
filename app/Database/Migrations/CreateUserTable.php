<?php

declare(strict_types=1);

namespace App\Database\Migrations;

use Tempest\Database\DatabaseMigration;
use Tempest\Database\QueryStatement;
use Tempest\Database\QueryStatements\CreateTableStatement;
use Tempest\Database\QueryStatements\DropTableStatement;

final class CreateUserTable implements DatabaseMigration
{
    public string $name = '2025-07-31_create_user_table';

    public function up(): QueryStatement
    {
        return new CreateTableStatement(
            tableName: 'users',
        )
            ->primary() // id
            ->varchar(name: 'first_name', length: 120, nullable: true)
            ->varchar(name: 'last_name', length: 120, nullable: true)
            ->varchar(name: 'email', length: 120, nullable: false)
            ->varchar(name: 'password', length: 120, nullable: true)
            ->datetime(name: 'created_at', nullable: true)
            ->datetime(name: 'updated_at', nullable: true)
            ->datetime(name: 'deleted_at', nullable: true);
    }

    public function down(): QueryStatement
    {
        return new DropTableStatement(
            tableName: 'users',
        );
    }
}
