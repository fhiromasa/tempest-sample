<?php

declare(strict_types=1);

/** @var \App\Models\Posts[] $posts */
?>

<div id="posts-container" class="posts-container">
    <x-post :foreach="$posts as $post" />
    <div :forelse>
        Nothing here
    </div>
</div>
