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
                <div class="create-post-section">
                    <button id="toggle-post-form" class="create-post-button">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 5v14"></path>
                            <path d="M5 12h14"></path>
                        </svg>
                        新しい投稿を作成
                    </button>
                    <div id="post-form-container" class="form-container hidden">
                        <form id="post-form" class="form">
                            <div class="form-header">
                                <h3 class="form-title">新しい投稿</h3>
                                <button type="button" id="close-post-form" class="close-button">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M18 6L6 18"></path>
                                        <path d="M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="form-group">
                                <label for="post-author" class="form-label">ユーザー名</label>
                                <input type="text" id="post-author" class="form-input" placeholder="your_username" required />
                            </div>
                            <div class="form-group">
                                <label for="post-title-input" class="form-label">タイトル</label>
                                <input type="text" id="post-title-input" class="form-input" placeholder="投稿のタイトルを入力..." required />
                            </div>
                            <div class="form-group">
                                <label for="post-body" class="form-label">本文</label>
                                <textarea id="post-body" class="form-textarea" placeholder="投稿の内容を入力..." rows="5" required></textarea>
                            </div>
                            <div class="form-actions">
                                <button type="button" id="cancel-post" class="btn btn-secondary">キャンセル</button>
                                <button type="submit" class="btn btn-primary">投稿する</button>
                            </div>
                        </form>
                    </div>
                </div>

                <h2 class="section-title">投稿一覧</h2>
                <div id="posts-container" class="posts-container">
                    <!-- Posts will be rendered here -->
                </div>
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
                    <div class="comment-form-section">
                        <form id="comment-form" class="form comment-form">
                            <div class="form-group">
                                <label for="comment-author" class="form-label">ユーザー名</label>
                                <input type="text" id="comment-author" class="form-input" placeholder="your_username" required />
                            </div>
                            <div class="form-group">
                                <label for="comment-body-input" class="form-label">コメント</label>
                                <textarea id="comment-body-input" class="form-textarea" placeholder="コメントを入力..." rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="reply-to" class="form-label">返信先 (オプション)</label>
                                <select id="reply-to" class="form-select">
                                    <option value="">新規コメント</option>
                                </select>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">コメントを投稿</button>
                            </div>
                        </form>
                    </div>

                    <div id="comments-container">
                        <!-- Comments will be rendered here -->
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-base>
