<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Comment;
use Tempest\Database\Direction;

class CommentRepository
{
    public function create(
        int $post_id,
        int $user_id,
        string $content,
    ): Comment {
        $comment = new Comment(
            post_id: $post_id,
            user_id: $user_id,
            content: $content,
        );
        $comment->save();

        return $comment;
    }

    /**
     * Find all comments for a given post.
     *
     * @return Comment[]
     */
    public function findByPostId(int $post_id, Direction $direction = Direction::DESC): array
    {
        /** @var array<array-key, \App\Models\Comment> */
        return Comment::select()
            ->where('post_id', $post_id)
            ->orderBy(field: 'created_at', direction: $direction)
            ->all();
    }
}
