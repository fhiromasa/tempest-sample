<?php

declare(strict_types=1);

namespace App\Http\Home;

use App\Repositories\PostRepository;
use Tempest\Router\Get;
use Tempest\View\View;

use function Tempest\View\view;

final readonly class HomeController
{
    #[Get(uri: '/')]
    public function __invoke(
        PostRepository $postRepository,
    ): View {
        return view(
            path: 'home.view.php',
            // params
            posts: $postRepository->getForHome(),
        );
    }
}
