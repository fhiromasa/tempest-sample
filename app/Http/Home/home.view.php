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

            <!-- Post detail view -->
            <div id="post-detail-view" class="view">
                <button id="back-button" class="back-button">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 12H5"></path>
                        <path d="M12 19l-7-7 7-7"></path>
                    </svg>
                    投稿一覧に戻る
                </button>
                <div id="post-detail-container">
                    <!-- Post detail will be rendered here -->
                </div>
                <div class="comments-section">
                    <h3 class="comments-title">コメント</h3>

                    <!-- Comment Form -->
                    <x-comment-form />

                    <div id="comments-container">
                        <!-- Comments will be rendered here -->
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-base>
