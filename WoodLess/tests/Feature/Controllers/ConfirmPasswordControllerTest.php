<?php

namespace Tests\Feature\Controllers\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ConfirmPasswordControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test password confirmation.
     *
     * @return void
     */
    public function test_password_confirmation()
    {
        // Create a user and log in
        $user = User::factory()->create([
            'password' => bcrypt('password123'),
        ]);
        Auth::login($user);

        // Send POST request to confirm password endpoint
        $response = $this->post('/password/confirm', [
            'password' => 'password123',
        ]);

        // Check if the user is redirected after password confirmation
        $response->assertRedirect('/');
    }
}
