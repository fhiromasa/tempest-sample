<?php

declare(strict_types=1);

/** @var \App\Models\Post[] $posts */
?>

<div id="posts-container" class="posts-container">
  <x-post-card :foreach="$posts as $post" />
  <div :forelse>
    Nothing here
  </div>
</div>
