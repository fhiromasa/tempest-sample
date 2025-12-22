<?php

declare(strict_types=1);

namespace App\Database\Migrations;

use App\Models\Permission;
use Tempest\Database\MigratesDown;
use Tempest\Database\MigratesUp;
use Tempest\Database\QueryStatements\CreateTableStatement;
use Tempest\Database\QueryStatements\DropTableStatement;

final class CreateUserPermissionsTable implements MigratesUp, MigratesDown
{
    public private(set) string $name = '0000-00-02_create_user_permissions_table';

    public function up(): CreateTableStatement
    {
        return new CreateTableStatement(tableName: 'user_permissions')
            ->primary()
            ->belongsTo(local: 'user_permissions.user_id', foreign: 'users.id')
            ->belongsTo(local: 'user_permissions.permission_id', foreign: 'permissions.id');
    }

    public function down(): DropTableStatement
    {
        return DropTableStatement::forModel(modelClass: Permission::class);
    }
}
