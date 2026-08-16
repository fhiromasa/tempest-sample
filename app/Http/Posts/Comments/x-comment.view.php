<?php

declare(strict_types=1);

use App\Models\Comments;
use App\Models\User;

use function Tempest\Support\str;

/**
 * @var Comments $comment
 */

$replyClass = '';
$author = User::getUnknownUser();

$avatarBackground = 'background: linear-gradient(135deg, #ff6b35, #e74c3c)';
$authorInitial = str($author->username)->substr(0, 1);

?>
<div :class="'comment ' . $replyClass" :data-comment-id="$comment->id">
    <div class="comment-header">
        <div class="comment-avatar" :style="$avatarBackground">{{ $authorInitial }}</div>
        <span class="comment-author">{{ $author->username }}</span>
        <span class="comment-time">{{ $comment->created_at }}</span>
    </div>
    <p class="comment-body">{{ $comment->content }}</p>
    <div class="comment-votes">
        <x-icon name="material-symbols:arrow-shape-up" />
        <span class="votes-count">{{ 0 }}</span>
        ポイント
    </div>
</div>
