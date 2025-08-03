<?php

declare(strict_types=1);

namespace App\Auth\Login;

use App\Controllers\HomeController;
use App\Models\User;
use Tempest\Auth\Authenticator;
use Tempest\Http\Response;
use Tempest\Http\Responses\Invalid;
use Tempest\Http\Responses\Redirect;
use Tempest\Router\Get;
use Tempest\Router\Post;
use Tempest\View\View;

use function Tempest\uri;
use function Tempest\view;

final class LoginController
{
    public function __construct(
        private Authenticator $authenticator,
    ) {}

    #[Get(uri: '/login')]
    public function loginForm(): View
    {
        return view('login.view.php');
    }

    #[Post(uri: '/login')]
    public function login(LoginRequest $request): Response
    {
        $user = User::select()
            ->where('email = ?', $request->email)
            ->first();

        if ($user === null) {
            return new Invalid(request: $request, failingRules: ['email' => [new UserNotFound()]]);
        }
        if (! password_verify($request->password, $user->password)) {
            return new Invalid(request: $request, failingRules: ['password' => [new PasswordMismatch()]]);
        }

        $this->authenticator->login($user);

        return new Redirect(uri([HomeController::class, '__invoke']));
    }
}
