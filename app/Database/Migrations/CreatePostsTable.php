<?php

declare(strict_types=1);

namespace App\Database\Migrations;

use Tempest\Database\MigratesDown;
use Tempest\Database\MigratesUp;
use Tempest\Database\QueryStatements\CreateTableStatement;
use Tempest\Database\QueryStatements\DropTableStatement;

final class CreatePostsTable implements MigratesUp, MigratesDown
{
    public private(set) string $name = '0000-00-00_create_posts_table';

    public function up(): CreateTableStatement
    {
        return new CreateTableStatement(tableName: 'posts')
            ->primary()
            ->varchar(name: 'user_id', length: 255)
            ->varchar(name: 'title', length: 255)
            ->text(name: 'content')
            ->datetime(name: 'created_at')
            ->datetime(name: 'updated_at');
    }

    public function down(): DropTableStatement
    {
        return new DropTableStatement(tableName: 'posts');
    }
}
