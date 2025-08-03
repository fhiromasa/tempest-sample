<?php

declare(strict_types=1);

namespace App\Controllers;

use Tempest\Router\Get;
use Tempest\View\View;

use function Tempest\view;

final readonly class HomeController
{
    #[Get(uri: '/')]
    public function __invoke(): View
    {
        return view(path: 'views/home.view.php');
    }
}
