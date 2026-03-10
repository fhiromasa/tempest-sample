<?php

declare(strict_types=1);

namespace App\Middleware;

use App\Auth\Login\LoginController;
use Tempest\Auth\Authentication\Authenticator;
use Tempest\Discovery\SkipDiscovery;
use Tempest\Http\Request;
use Tempest\Http\Response;
use Tempest\Http\Responses\Redirect;
use Tempest\Router\HttpMiddleware;
use Tempest\Router\HttpMiddlewareCallable;

use function Tempest\Router\uri;

#[SkipDiscovery]
final class MustBeAuthenticated implements HttpMiddleware
{
    function __construct(
        private Authenticator $authenticator,
    ) {}

    public function __invoke(
        Request $request,
        HttpMiddlewareCallable $handler,
    ): Response {
        ll(
            self::class
            . " called from {$request->method->value} {$request->path}",
        );
        // Check if the user is authenticated
        if (is_null($this->authenticator->current())) {
            // return new Response(401, [], 'Unauthorized');
            return new Redirect(to: uri(action: [
                LoginController::class,
                'loginForm',
            ]));
        }

        return $handler($request);
    }
}
