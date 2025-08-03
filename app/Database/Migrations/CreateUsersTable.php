<?php

declare(strict_types=1);

namespace App\Database\Migrations;

use App\Models\User;
use Tempest\Database\DatabaseMigration;
use Tempest\Database\QueryStatements\CreateTableStatement;
use Tempest\Database\QueryStatements\DropTableStatement;

final class CreateUsersTable implements DatabaseMigration
{
    public private(set) string $name = '0000-00-00_create_users_table';

    public function up(): CreateTableStatement
    {
        return new CreateTableStatement(tableName: 'users')
            ->primary()
            ->varchar(name: 'name')
            ->varchar(name: 'email')
            ->datetime(name: 'emailValidatedAt', nullable: true)
            ->text(name: 'password');
    }

    public function down(): DropTableStatement
    {
        return DropTableStatement::forModel(modelClass: User::class);
    }
}
