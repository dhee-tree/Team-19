<?php

namespace Tests\Feature\Controllers;

use App\Models\EmailVerificationCode;
use Tests\TestCase;
use App\Models\User;
use App\Models\Review;
use App\Models\Product;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;

class ReviewTest extends TestCase
{
    use RefreshDatabase;
    protected User $user;
    protected Product $product;

    /**
     * Set up the Controller before each test.
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->product = Product::factory()->create();

        User::factory(50)->create();
        Review::factory()->create([
            'product_id' => $this->product->id
        ]);

        $this->user = User::factory()->create();
        
        EmailVerificationCode::create([
            'user_id' => $this->user->id,
            'is_verified' => true,
            'code' => 'test'
        ]);

        $this->actingAs($this->user);
    }

    /**
     * Test to see if the review controller can handle when the product is deleted.
     */
    public function test_review_controller_cannot_store_review_if_product_does_not_exist()
    {   
        $response = $this->post('review/50', [
            'rating' => 5,
            'description' => '12345678910111213141516171819202122232425',
        ]);
        
        $response->assertRedirect('/');
        $this->assertEquals('Product no longer exists.', session('message'));
        Artisan::call('migrate:fresh --env=testing');
    }

    /**
     * Test to see if the review controller can handle invalid input
     */
    public function test_review_controller_cannot_store_review_if_validation_errors()
    {   
        $review = [
            'rating' => 0,
            'description' => 'lessthan25',
        ];

        $response = $this->from('product/'.$this->product->id)->post('review/'.$this->product->id, $review);
        
        $response->assertRedirect('product/'.$this->product->id.'#go-reviews');
        $this->assertEquals('Description must be longer than 25 characters.', session('message'));
        $this->assertNull($this->user->reviews()->where('product_id', $this->product->id)->first());
        Artisan::call('migrate:fresh --env=testing');    
    }

}
