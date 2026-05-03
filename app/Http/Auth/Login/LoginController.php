<?php

declare(strict_types=1);

namespace App\Http\Auth\Login;

use App\Http\Home\HomeController;
use App\Http\Mypage\MypageController;
use App\Models\User;
use Tempest\Auth\Authentication\Authenticator;
use Tempest\Http\Response;
use Tempest\Http\Responses\Back;
use Tempest\Http\Responses\Redirect;
use Tempest\Http\Session\FormSession;
use Tempest\Router\Get;
use Tempest\Router\Post;
use Tempest\Validation\FailingRule;
use Tempest\View\View;

use function Tempest\Router\uri;
use function Tempest\View\view;

final readonly class LoginController
{
    public function __construct(
        private Authenticator $authenticator,
        private FormSession $formSession,
    ) {}

    #[Get(uri: '/login')]
    public function loginForm(): View
    {
        return \Tempest\View\view(path: 'login.view.php');
    }

    #[Post(uri: '/login')]
    public function login(LoginRequest $request): Response
    {
        $user = User::find(email: $request->email)->first();

        if (! $user instanceof User) {
            $this->formSession->setErrors([
                'email' => [new FailingRule(new UserNotFound())],
            ]);
            return new Back();
        }
        if (! password_verify($request->password, $user->password)) {
            $this->formSession->setErrors([
                'password' => [new FailingRule(new PasswordMismatch())],
            ]);
            return new Back();
        }

        $this->authenticator->authenticate(authenticatable: $user);

        return new Redirect(to: uri(action: [
            MypageController::class,
            'index',
        ]));
    }

    #[Get(uri: '/logout')]
    public function logout(): Response
    {
        $this->authenticator->deauthenticate();

        return new Redirect(to: uri(action: [
            HomeController::class,
            '__invoke',
        ]));
    }
}
