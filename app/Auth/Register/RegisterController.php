<?php

declare(strict_types=1);

namespace App\Auth\Register;

use App\Auth\Register\RegisterRequest;
use App\Home\HomeController;
use App\Models\User;
use Tempest\Http\Responses\Redirect;
use Tempest\Log\Logger;
use Tempest\Router\Get;
use Tempest\Router\Post;
use Tempest\View\View;

use function Tempest\Router\uri;
use function Tempest\view;

final class RegisterController
{
    public function __construct() {}

    #[Get(uri: '/register')]
    public function registerForm(): View
    {
        return view(path: 'register.view.php');
    }

    #[Post(uri: '/register')]
    public function register(RegisterRequest $request): Redirect
    {
        $user = User::create(
            name: 'sample',
            email: $request->email,
            password: $request->password,
        );
        return new Redirect(to: uri(action: [HomeController::class, '__invoke']));
    }
}
