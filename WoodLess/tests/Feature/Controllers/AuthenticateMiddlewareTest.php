<?php

namespace Tests\Unit\Http\Middleware;

use Tests\TestCase;
use Illuminate\Http\Request;
use App\Http\Middleware\Authenticate;
use Illuminate\Auth\AuthManager;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Auth\AuthenticationException;

class AuthenticateMiddlewareTest extends TestCase
{
    public function test_unauthenticated_user_is_redirected_to_login_route()
    {
        // Mock the Guard interface
        $guard = $this->createMock(Guard::class);
        $guard->expects($this->once())->method('check')->willReturn(false);

        // Mock the AuthManager
        $authManager = $this->createMock(AuthManager::class);
        $authManager->method('guard')->willReturn($guard);

        // Create an instance of the middleware with the mocked AuthManager
        $middleware = new Authenticate($authManager);

        // Create a mock request
        $request = Request::create('/test-route', 'GET');

        // Assert that AuthenticationException is thrown
        $this->expectException(AuthenticationException::class);

        // Call the handle method of the middleware
        $middleware->handle($request, function () {});
    }

}
