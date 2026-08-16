<?php

declare(strict_types=1);

namespace App\Http\Posts\Comments;

use App\Http\Posts\PostController;
use App\Repositories\CommentRepository;
use Tempest\Http\Response;
use Tempest\Http\Responses\Redirect;
use Tempest\Http\Responses\ServerError;
use Tempest\Log\Logger;
use Tempest\Router\Post;

use function Tempest\Router\uri;

final readonly class CommentController
{
    public function __construct(
        private CommentRepository $commentRepository,
        private Logger $logger,
    ) {}

    #[Post(uri: '/posts/{post_id}/comments')]
    public function createComment(CreateCommentRequest $request, int $post_id): Response
    {
        $this->logger->debug(__METHOD__ . ' - ' . (string) json_encode($request));
        $guestUserId = 0;

        try {
            $comment = $this->commentRepository->create(
                post_id: $post_id,
                user_id: $guestUserId,
                content: $request->content,
            );
        } catch (\Exception $e) {
            $this->logger->alert($e->getMessage());
            return new ServerError();
        }

        return new Redirect(to: uri(
            action: [
                PostController::class,
                'showPostById',
            ],
            id: $post_id,
        ));
    }
}
