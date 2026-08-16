<?php

declare(strict_types=1);

use App\Http\Posts\Comments\CommentController;

use function Tempest\Router\uri;

/**
 * @var string $postId
 */

$newCommentAction = uri(
    action: [CommentController::class, 'createComment'],
    // params
    post_id: $postId,
);

?>

<div class="comment-form-section">
    <x-form id="comment-form" class="form comment-form" :action="$newCommentAction" :method="'POST'">
        <x-input :id="'post-author'" :type="'text'" :name="'post-author'" :label="'ユーザー名'" placeholder="your_username" required />
        <x-input :id="'comment-body-input'" :type="'textarea'" :name="'content'" :label="'コメント'" placeholder="コメント内容を入力..." required />
        <!-- セレクトボックスにする -->
        <x-input :id="'reply-to'" :type="'select'" :name="'reply-to'" :label="'返信先 (オプション)'" :options="[]" />

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">コメントを投稿</button>
        </div>
    </x-form>
</div>
