<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Post;
use Tempest\Database\Direction;
use Tempest\Database\PrimaryKey;

final class PostRepository
{
    public static function create(
        int $user_id,
        string $title,
        string $content,
        int $votes = 0,
    ): Post {
        $post = new Post(
            user_id: $user_id,
            title: $title,
            content: $content,
            votes: $votes,
        );
        $post->save();

        return $post;
    }

    public function findById(string|int|PrimaryKey $id): ?Post
    {
        return Post::findById($id);
    }

    /**
     * @return Post[]
     */
    public function getForHome(int $limit = 20): array
    {
        return Post::select()
            ->orderBy(field: 'created_at', direction: Direction::DESC)
            ->limit(limit: $limit)
            ->all();
    }
}
