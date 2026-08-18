<?php

declare(strict_types=1);

namespace App\Http\Posts;

use App\Http\Home\HomeController;
use App\Repositories\CommentRepository;
use App\Repositories\PostRepository;
use Tempest\Http\Request;
use Tempest\Http\Response;
use Tempest\Http\Responses\NotFound;
use Tempest\Http\Responses\Redirect;
use Tempest\Http\Responses\ServerError;
use Tempest\Log\Logger;
use Tempest\Router\Get;
use Tempest\Router\Post;
use Tempest\View\View;

use function Tempest\Router\uri;
use function Tempest\View\view;

final readonly class PostController
{
    public function __construct(
        private PostRepository $postRepo,
        private CommentRepository $commentRepo,
        private Logger $logger,
    ) {}

    #[Post('/posts')]
    public function createPost(CreatePostRequest $request): Response
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
            return new ServerError();
        }

        return new Redirect(to: uri(action: [
            HomeController::class,
            '__invoke',
        ]));
    }

    #[Get(uri: 'posts/{id}')]
    public function showPostById(int $id, Request $request): View|Response
    {
        $this->logger->debug(__METHOD__ . ' - ' . (string) json_encode($request));
        $post = $this->postRepo->findById($id);
        if (is_null($post)) {
            return new NotFound();
        }

        $comments = $this->commentRepo->findByPostId($id);
        // ld((string) json_encode($comments));

        return view(
            path: 'post.view.php',
            // data
            author: null,
            post: $post,
            comments: $comments,
        );
    }
}
