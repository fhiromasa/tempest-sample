<?php
/** @var \App\Models\Posts[] $posts */
?>

<div id="posts-container" class="posts-container">
    <?php foreach ($posts as $post): ?>
        <x-post :post="$post" />
    <?php endforeach; ?>
</div>
