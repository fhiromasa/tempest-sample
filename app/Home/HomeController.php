<?php

declare(strict_types=1);

namespace App\Home;

use Tempest\Router\Get;
use Tempest\View\View;

use function Tempest\view;

final readonly class HomeController
{
    #[Get(uri: '/')]
    public function __invoke(): View
    {
        return view(path: 'home.view.php');
    }
}
