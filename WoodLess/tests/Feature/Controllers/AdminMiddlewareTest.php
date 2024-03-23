<?php

namespace Tests\Feature\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;



namespace Tests\Unit\Http\Middleware;

use Tests\TestCase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\Admin;

class AdminMiddlewareTest extends TestCase
{
    /**
     * Test if admin user with appropriate access level can access the route.
     *
     * @return void
     */
    public function test_admin_user_with_appropriate_access_level_can_access_route()
    {
        // Mocking authenticated admin user
        $user = new \stdClass();
        $user->access_level = 3; // Assuming access level 3 is required for admin access
        Auth::shouldReceive('check')->once()->andReturn(true);
        Auth::shouldReceive('user')->once()->andReturn($user);

        // Create a request
        $request = Request::create('/admin-route', 'GET');

        // Create an instance of the Admin middleware
        $middleware = new Admin();

        // Mock the closure
        $next = function ($request) {
            return 'OK';
        };

        // Call the middleware handle method
        $response = $middleware->handle($request, $next, 3);

        // Assert that the response is 'OK'
        $this->assertEquals('OK', $response);
    }

    /**
     * Test if non-admin user is redirected to home route.
     *
     * @return void
     */
    public function test_non_admin_user_is_redirected_to_home_route()
    {
        // Mocking authenticated non-admin user
        $user = new \stdClass();
        $user->access_level = 2; // Assuming access level 2 is not sufficient for admin access
        Auth::shouldReceive('check')->once()->andReturn(true);
        Auth::shouldReceive('user')->once()->andReturn($user);

        // Create a request
        $request = Request::create('/admin-route', 'GET');

        // Create an instance of the Admin middleware
        $middleware = new Admin();

        // Mock the closure
        $next = function ($request) {
            return 'OK';
        };

        // Call the middleware handle method
        $response = $middleware->handle($request, $next, 3);

        // Assert that the response is a redirect to home route
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertEquals(route('home'), $response->getTargetUrl());
    }

    /**
     * Test if unauthenticated user is redirected to login route.
     *
     * @return void
     */
    public function test_unauthenticated_user_is_redirected_to_login_route()
    {
        // Mocking unauthenticated user
        Auth::shouldReceive('check')->once()->andReturn(false);

        // Create a request
        $request = Request::create('/admin-route', 'GET');

        // Create an instance of the Admin middleware
        $middleware = new Admin();

        // Mock the closure
        $next = function ($request) {
            return 'OK';
        };

        // Call the middleware handle method
        $response = $middleware->handle($request, $next, 3);

        // Assert that the response is a redirect to login route
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertEquals(route('login'), $response->getTargetUrl());
    }
}
