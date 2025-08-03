<?php

declare(strict_types=1);

namespace App\Auth\Register;

use App\Auth\Register\RegisterRequest;
use App\Controllers\HomeController;
use App\Models\User;
use Tempest\Http\Responses\Redirect;
use Tempest\Router\Get;
use Tempest\Router\Post;
use Tempest\View\View;

use function Tempest\uri;
use function Tempest\view;

final class RegisterController
{
    public function __construct() {}

    #[Get(uri: '/register')]
    public function registerForm(): View
    {
        return view('register.view.php');
    }

    #[Post(uri: '/register')]
    public function register(RegisterRequest $request): Redirect
    {
        $user = new User(name: 'sample', email: $request->email, userPermissions: []);
        $user->setPassword($request->password);

        $user = User::create(name: $user->name, email: $user->email);
        $user->setPassword($request->password);
        $user->save();

        return new Redirect(uri([HomeController::class, '__invoke']));
    }
}
