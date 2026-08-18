<?php

declare(strict_types=1);

/** @var \App\Models\Comment[] $comments */
?>

<div id="comments-container" class="comments-container">
  <x-comment :foreach="$comments as $comment" />
  <div :forelse>
    No Comments.
  </div>
</div>
