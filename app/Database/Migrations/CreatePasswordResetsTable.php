<?php

declare(strict_types=1);

namespace App\Database\Migrations;

use Tempest\Database\MigratesDown;
use Tempest\Database\MigratesUp;
use Tempest\Database\QueryStatements\CreateTableStatement;
use Tempest\Database\QueryStatements\DropTableStatement;

final class CreatePasswordResetsTable implements MigratesUp, MigratesDown
{
    public private(set) string $name = '0000-00-00_create_password_resets_table';

    #[\Override]
    public function up(): CreateTableStatement
    {
        return new CreateTableStatement(tableName: 'password_resets')
            ->primary()
            ->varchar(name: 'user_id', length: 255)
            ->varchar(name: 'token', length: 255)
            ->datetime(name: 'expires_at')
            ->datetime(name: 'created_at')
            ->datetime(name: 'updated_at');
    }

    #[\Override]
    public function down(): DropTableStatement
    {
        return new DropTableStatement(tableName: 'password_resets');
    }
}
