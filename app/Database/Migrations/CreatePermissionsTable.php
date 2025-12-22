<?php

declare(strict_types=1);

namespace App\Database\Migrations;

use App\Models\Permission;
use Tempest\Database\MigratesDown;
use Tempest\Database\MigratesUp;
use Tempest\Database\QueryStatements\CreateTableStatement;
use Tempest\Database\QueryStatements\DropTableStatement;

final class CreatePermissionsTable implements MigratesUp, MigratesDown
{
    public private(set) string $name = '0000-00-01_create_permissions_table';

    public function up(): CreateTableStatement
    {
        return new CreateTableStatement(tableName: 'permissions')
            ->primary()
            ->varchar(name: 'name');
    }

    public function down(): DropTableStatement
    {
        return DropTableStatement::forModel(modelClass: Permission::class);
    }
}
