<?php

declare(strict_types=1);

namespace App\Http\Posts;

use App\Http\Home\HomeController;
use App\Repositories\PostRepository;
use Tempest\Http\Response;
use Tempest\Http\Responses\Redirect;
use Tempest\Http\Status;
use Tempest\Log\Logger;
use Tempest\Router\Post;

use function Tempest\Router\uri;

final readonly class PostController
{
    public function __construct(
        private PostRepository $postRepo,
        private Logger $logger,
    ) {}

    #[Post('/posts')]
    public function createPost(CreatePostRequest $request): Redirect
    {
        $this->logger->debug(__METHOD__ . ' - ' . (string) json_encode($request));
        $guestUserId = 0;

        try {
            $newPost = $this->postRepo->create(
                user_id: $guestUserId,
                title: $request->title,
                content: $request->content,
            );
        } catch (\Exception $e) {
            $this->logger->alert($e->getMessage());
            return new Response()->setStatus(Status::INTERNAL_SERVER_ERROR);
        }

        return new Redirect(to: uri(action: [
            HomeController::class,
            '__invoke',
        ]));
    }
}
