<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{   
    use RefreshDatabase;
    protected $user;
    protected $password;

    /**
     * Set up the user before each test.
     */
    protected function setUp(): void
    {
        parent::setUp();
        
        $this->password = 'test';
        $this->user = User::factory()->create([
            'password' => Hash::make($this->password)
        ]);
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

    /**
     * Test to see if user cannot login if credentials are correct
     */
    public function test_user_can_login_if_correct_credentials()
    {   
        $this->withExceptionHandling();
        $response = $this->from('/login')->post('/login', [
            'email' => $this->user->email,
            'password' => $this->password,
            'remember' => 'on'
        ]);
        
        $response->assertRedirect('/');
        $this->assertAuthenticatedAs($this->user);
    }
}
