<?php

namespace Tests\Feature\Models;

use Tests\TestCase;
use App\Models\User;
use App\Models\EmailVerificationCode;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmailVerificationCodeTest extends TestCase
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
            'code' => 'test',
        ]);
    }

    /**
     * Test to see if the model can its user.
     */
    public function test_email_verification_code_model_can_get_user(): void
    {   
        $user = $this->code->user()->first();
        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals('test', $user->first_name);
    }
}
