<?php

declare(strict_types=1);

namespace App\Http\Home;

use Tempest\Router\Get;
use Tempest\View\View;

use function Tempest\View\view;

final readonly class HomeController
{
    #[Get(uri: '/')]
    public function __invoke(): View
    {
        return \Tempest\View\view(path: 'home.view.php');
    }
}
