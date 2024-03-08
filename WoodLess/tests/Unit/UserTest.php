<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Log;

use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
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
     * Test if the user is not an admin.
     */
    public function test_user_is_not_admin(): void
    {   
        $this->assertFalse((bool)($this->user->isAdmin()));
    }

    /**
     * Test if the user has a basket.
     */
    public function test_user_has_basket(): void
    {   
        $this->assertNotNull($this->user->basket());
    }
}
