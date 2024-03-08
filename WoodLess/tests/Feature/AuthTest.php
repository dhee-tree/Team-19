<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthTest extends TestCase
{   
    use RefreshDatabase;
    protected $user;

    /**
     * Set up the user before each test.
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
    }

    /**
     * Test to see if user view login page.
     */
    public function test_user_can_view_login_page(): void
    {   
        $response = $this->get('/login');

        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }

    /**
     * Test to see if user view register page.
     */
    public function test_user_can_view_register_page(): void
    {   
        $response = $this->get('/register');

        $response->assertSuccessful();
        $response->assertViewIs('auth.register');
    }

    /**
     * Test to see if user cannot login if the password is incorrect
     */
    public function test_user_cannot_login_if_incorrect_password()
    {   
        $response = $this->from('/login')->post('/login', [
            'email' => $this->user->email,
            'password' => 'invalid-password',
        ]);
        
        $response->assertRedirect('/login');
        $response->assertSessionHasErrors('email');
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }
}
