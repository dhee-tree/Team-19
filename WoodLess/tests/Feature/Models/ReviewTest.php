<?php

namespace Tests\Feature\Models;

use Tests\TestCase;
use App\Models\User;
use App\Models\Review;
use App\Models\Product;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReviewTest extends TestCase
{   
    use RefreshDatabase;
    protected Review $review;

    /**
     * Set up the review before each test.
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->review = Review::factory()->create([
            'user_id' => User::factory()->create(['first_name' => 'test'])->id,
            'product_id' => Product::factory(['title' => 'test'])->create()->id,
        ]);
    }

    /**
     * Test to see if the model can its product.
     */
    public function test_review_model_can_get_products(): void
    {   
        $product = $this->review->product()->first();
        $this->assertInstanceOf(Product::class, $product);
        $this->assertEquals('test', $product->title);
    }

    /**
     * Test to see if the model can get its user.
     */
    public function test_review_model_can_get_user(): void
    {
        $user = $this->review->user()->first();
        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals('test', $user->first_name);
    }
}
