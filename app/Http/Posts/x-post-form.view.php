<?php

declare(strict_types=1);

use App\Http\Posts\PostController;

use function Tempest\Router\uri;

$newPostAction = uri(action: [PostController::class, 'createPost']);

?>

<div class="create-post-section">
    <button id="toggle-post-form" class="create-post-button">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M12 5v14"></path>
            <path d="M5 12h14"></path>
        </svg>
        新しい投稿を作成
    </button>
    <div id="post-form-container" class="form-container hidden">
        <x-form id="aaaaapost-form" class="form" :action="$newPostAction" :method="'POST'">
            <div class="form-header">
                <h3 class="form-title">新しい投稿</h3>
                <button type="button" id="close-post-form" class="close-button">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6L6 18"></path>
                        <path d="M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <x-input :id="'post-author'" :type="'text'" :name="'post-author'" :label="'ユーザー名'" placeholder="your_username" required />
            <x-input :id="'post-title'" :type="'text'" :name="'title'" :label="'タイトル'" placeholder="投稿のタイトルを入力..." required />
            <x-input :id="'post-body'" :type="'textarea'" :name="'content'" :label="'本文'" placeholder="投稿の内容を入力..." rows="5" required />

            <div class="form-actions">
                <button type="button" id="cancel-post" class="btn btn-secondary">キャンセル</button>
                <button type="submit" class="btn btn-primary">投稿する</button>
            </div>
        </x-form>
    </div>
</div>
