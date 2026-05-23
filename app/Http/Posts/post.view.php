<?php

declare(strict_types=1);

?>
<x-base>
    <main class="main">
        <div class="container">
            <div id="post-detail-view" class="view active">
                <button id="back-button" class="back-button">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 12H5"></path>
                        <path d="M12 19l-7-7 7-7"></path>
                    </svg>
                    投稿一覧に戻る
                </button>
                <div id="post-detail-container">
                    <!-- Post detail will be rendered here -->
                    <x-post />
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
