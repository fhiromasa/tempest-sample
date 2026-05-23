<?php

declare(strict_types=1);

use App\Models\Posts;
use App\Models\User;

use function Tempest\Support\str;

/**
 * @var User|null $author
 * @var Posts $post
 */

$author ??= User::getUnknownUser();

$avatarBackground = 'background: linear-gradient(135deg, #ff6b35, #e74c3c)';
$authorInitial = str($author?->username)->substr(0, 1);

?>

<article class="post-detail">
  <div class="post-header">
    <div class="post-avatar" :style="$avatarBackground">{{ $authorInitial }}</div>
    <div class="post-meta">
      <span class="post-author">{{ $author->username }}</span>
      <span class="post-time">{{ $post->created_at }}</span>
    </div>
  </div>
  <h2 class="post-title">{{ $post->title }}</h2>
  <p class="post-content full">{{ $post->content }}</p>
  <div class="post-stats">
    <div class="stat">
      <x-icon name="bxs:upvote" />
      <span class="stat-votes">{{ $post->votes }}</span>
    </div>
    <div class="stat">
      <x-icon name="material-symbols:comment" />
      <span>{{ $post->comment_count }} コメント</span>
    </div>
  </div>
</article>
