<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Comments;
use Tempest\Database\Direction;

class CommentRepository
{
    public function create(
        int $post_id,
        int $user_id,
        string $content,
    ): Comments {
        $comment = new Comments(
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
     * @return Comments[]
     */
    public function findByPostId(int $post_id): array
    {
        /** @var array<array-key, \App\Models\Comments> */
        return Comments::select()
            ->where('post_id', $post_id)
            ->orderBy(field: 'created_at', direction: Direction::DESC)
            ->all();
    }
}
