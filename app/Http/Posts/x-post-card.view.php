<?php

declare(strict_types=1);

use App\Models\Post;
use App\Models\User;

/**
 * @var User|null $author
 * @var Post $post
 */

$author ??= User::getUnknownUser();

?>

<article class="post-card" :data-post-id="$post->id->value">
  <x-post-c-header :author="$author" :createdAt="$post->created_at" />
  <h3 class="post-title">{{ $post->title }}</h3>
  <p class="post-content">{{ $post->content }}</p>
  <x-post-c-stat :votes="$post->votes" :commentCount="$post->comment_count" />
</article>
