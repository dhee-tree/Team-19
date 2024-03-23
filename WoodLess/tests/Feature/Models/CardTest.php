<?php

namespace Tests\Feature\Models;

use Tests\TestCase;
use App\Models\Card;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CardTest extends TestCase
{
    use RefreshDatabase;
    protected Card $card;

    /**
     * Set up the model before each test.
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->card = Card::factory()->create([
            'user_id' => User::factory()->create(['first_name' => 'test'])->id,
        ]);
    }

    /**
     * Test to see if the model can its user.
     */
    public function test_address_model_can_get_user(): void
    {   
        $user = $this->card->user()->first();
        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals('test', $user->first_name);
    }
}
