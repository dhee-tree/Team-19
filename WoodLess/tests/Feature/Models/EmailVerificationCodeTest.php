<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\EmailVerificationCode;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmailVerificationTest extends TestCase
{
    use RefreshDatabase;
    protected EmailVerificationCode $code;

    /**
     * Set up the model before each test.
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->code = EmailVerificationCode::create([
            'user_id' => User::factory()->create(['first_name' => 'test'])->id,
        ]);
    }

    /**
     * Test to see if the model can its user.
     */
    public function test_review_model_can_get_user(): void
    {   
        $user = $this->code->user()->first();
        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals('test', $user->first_name);
    }
}
