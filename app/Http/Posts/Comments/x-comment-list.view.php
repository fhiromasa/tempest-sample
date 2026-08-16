<?php

declare(strict_types=1);

/** @var \App\Models\Comments[] $comments */
?>

<div id="comments-container" class="comments-container">
    <x-comment :foreach="$comments as $comment" />
    <div :forelse>
        No Comments.
    </div>
</div>
