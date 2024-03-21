<?php

namespace Tests\Feature\Controllers;

use App\Http\Controllers\ChangePasswordController;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Tests\TestCase;

class ChangePasswordTest extends TestCase
{
    use RefreshDatabase;
    protected $user;
    protected $userWithPassword;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
        $this->userWithPassword = User::factory()->create([
            'password' => Hash::make('old_password'),
        ]);
    }
    
    public function test_show_change_password_form()
    {
        $this->actingAs($this->user);
    
        $response = $this->get(route('password.change.form'));
    
        $response->assertStatus(200);
        
    }
    

    public function test_user_can_change_password()
    {
        $this->actingAs($this->userWithPassword);
        $newPassword = Str::random(10);

        $this->post(route('password.change'), [
            'current_password' => 'old_password',
            'password' => $newPassword,
            'confirmed' => $newPassword,
        ]);

        // Check if the password has been updated
        $this->userWithPassword->refresh();
        $this->assertTrue(Hash::check($newPassword, $this->userWithPassword->password));
        $this->artisan('migrate:fresh --env=testing');
    }

    public function test_user_cannot_change_password_with_invalid_current_password()
    {
        $this->actingAs($this->userWithPassword);

        $response = $this->post(route('password.change'), [
            'current_password' => 'invalid_current_password',
            'password' => 'new_password',
            'confirmed' => 'new_password',
        ]);

        // Check new password is not the current password
        $this->userWithPassword->refresh();
        $this->assertFalse(Hash::check('new_password', $this->userWithPassword->password));
    }

    public function test_change_password_with_invalid_confirmation()
    {
        $this->actingAs($this->userWithPassword);

        $response = $this->post(route('password.change'), [
            'current_password' => 'old_password',
            'password' => 'new_password',
            'confirmed' => 'invalid_confirmation',
        ]);

        // Check new password is not the current password
        $this->userWithPassword->refresh();
        $this->assertFalse(Hash::check('new_password', $this->userWithPassword->password));
    }
}
