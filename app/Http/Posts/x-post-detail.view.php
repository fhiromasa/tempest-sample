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

<article class="post-detail">
  <x-post-c-header :author="$author" :createdAt="$post->created_at" />
  <h2 class="post-title">{{ $post->title }}</h2>
  <p class="post-content full">{{ $post->content }}</p>
  <x-post-c-stat :votes="$post->votes" :commentCount="$post->comment_count" />
</article>
