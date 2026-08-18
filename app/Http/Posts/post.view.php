<?php

declare(strict_types=1);

use App\Http\Home\HomeController;

use function Tempest\Router\uri;

?>
<x-base>
    <main class="main">
        <div class="container">
            <div id="post-detail-view" class="view active">
                <?php $backUrl = uri(action: [HomeController::class, '__invoke']); ?>
                <a href="{{ $backUrl }}" class="back-button">
                    <x-icon name="material-symbols:arrow-back" />
                    投稿一覧に戻る
                </a>
                <div id="post-detail-container">
                    <!-- Post detail will be rendered here -->
                    <x-post-detail />
                </div>
                <div class="comments-section">
                    <h3 class="comments-title">コメント</h3>

                    <!-- Comment Form -->
                    <x-comment-form :postId="$post->id" />

                    <div id="comments-container">
                        <x-comment-list :comments="$comments" />
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-base>
