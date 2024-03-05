<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_make_and_check_admin(): void
    {
        $user = User::factory()->create()->first();
        $user->is_admin = true;
        $user->save();

        $this->assertTrue($user->isAdmin());
    }
}
