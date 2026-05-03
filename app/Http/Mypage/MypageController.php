<?php

declare(strict_types=1);

namespace App\Http\Mypage;

use App\Middleware\MustBeAuthenticated;
use App\Models\User;
use Tempest\Auth\Authentication\Authenticator;
use Tempest\Router\Get;
use Tempest\View\View;

use function Tempest\View\view;

final class MypageController
{
    function __construct(
        private Authenticator $authenticator,
    ) {}

    #[Get(uri: '/mypage', middleware: [MustBeAuthenticated::class])]
    public function index(): View
    {
        /** @var User $user */
        $user = $this->authenticator->current();
        return \Tempest\View\view('mypage.view.php')
            ->data(
                id: $user->id,
                email: $user->email,
            );
    }
}
