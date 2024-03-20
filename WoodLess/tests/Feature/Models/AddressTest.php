<?php

namespace Tests\Feature\Models;

use Tests\TestCase;
use App\Models\User;
use App\Models\Address;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AddressTest extends TestCase
{
    use RefreshDatabase;
    protected Address $address;

    /**
     * Set up the model before each test.
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->address = Address::factory()->create([
            'user_id' => User::factory()->create(['first_name' => 'test'])->id,
        ]);
    }

    /**
     * Test to see if the model can its user.
     */
    public function test_address_model_can_get_user(): void
    {   
        $user = $this->address->user()->first();
        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals('test', $user->first_name);
    }
}
