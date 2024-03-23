<?php

namespace Tests\Feature\Http\Controllers;

use App\Http\Controllers\AddressController;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\RouteCollection;
use Tests\TestCase;

class AddressControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test storing a new address.
     *
     * @return void
     */
    public function test_store_method_stores_new_address()
    {
        // Mock authenticated user
        $user = User::factory()->create();
        $this->actingAs($user);

        // Mock request data
        $requestData = [
            'house_number' => '123',
            'street_name' => 'Main St',
            'postcode' => '12345',
            'city' => 'City',
        ];

        // Mock request
        $request = new Request($requestData);

        // Mock validation
        $validator = Validator::make($requestData, [
            'house_number' => 'required|max:255',
            'street_name' => 'required|max:255',
            'postcode' => 'required|max:255',
            'city' => 'required|max:255',
        ]);
        $this->assertFalse($validator->fails());

        // Mock Auth facade
        Auth::shouldReceive('user')->andReturn($user);

        // Mock the existence of verification.notice route
        Route::shouldReceive('has')->with('verification.notice')->andReturn(true);

        // Mock the behavior of the getRoutes() method
        $routes = new RouteCollection();
        Route::shouldReceive('getRoutes')->andReturn($routes);

        // Create AddressController instance
        $controller = new AddressController();

        // Call store method
        $response = $controller->store($request);

        // Assert that the address is stored successfully
        $this->assertTrue($user->addresses()->where($requestData)->exists());

        // Assert that the response is a redirect
        $this->assertTrue($response->isRedirect());

        // Assert that the redirect contains success message
        $this->assertNotNull($response->getSession()->get('success'));
    }
}
