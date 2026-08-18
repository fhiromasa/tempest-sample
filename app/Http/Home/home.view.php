<?php

declare(strict_types=1);

// namespace App\views;

?>
<x-base>
  <main class="main">
    <div class="container">
      <!-- Post list view -->
      <div id="post-list-view" class="view active">
        <!-- New Post Form -->
        <x-post-form />

        <h2 class="section-title">投稿一覧</h2>
        <x-post-list :posts="$posts" />
      </div>
    </div>
  </main>
</x-base>
