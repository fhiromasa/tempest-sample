<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Posts;

final class PostRepository
{
    public static function create(
        int $user_id,
        string $title,
        string $content,
        int $votes = 0,
    ): Posts {
        $post = new Posts(
            user_id: $user_id,
            title: $title,
            content: $content,
            votes: $votes,
        );
        $post->save();

        return $post;
    }
}
