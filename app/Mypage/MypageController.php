<?php

declare(strict_types=1);

namespace App\Mypage;

use App\Middleware\MustBeAuthenticated;
use Tempest\Auth\Authentication\Authenticator;
use Tempest\Router\Get;
use Tempest\View\View;

use function Tempest\view;

final class MypageController
{
    function __construct(
        private Authenticator $authenticator,
    ) {}

    #[Get(uri: '/mypage', middleware: [MustBeAuthenticated::class])]
    public function index(): View
    {
        return view('mypage.view.php');
    }
}
