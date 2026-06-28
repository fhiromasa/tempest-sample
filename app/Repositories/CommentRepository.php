<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Comments;

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
}
