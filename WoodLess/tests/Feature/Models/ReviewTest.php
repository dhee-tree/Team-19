<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Review;
use App\Models\Product;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function PHPUnit\Framework\assertInstanceOf;

class ReviewTest extends TestCase
{   
    use RefreshDatabase;
    protected $review;

    /**
     * Set up the review before each test.
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->review = Review::factory()->create([
            'user_id' => User::factory()->create()->id,
            'product_id' => Product::factory()->create()->id,
        ]);
    }

    /**
     * Test to see if the model can its product.
     */
    public function test_review_model_can_get_products(): void
    {
        assertInstanceOf(Product::class, $this->review->product()->first());
    }

    /**
     * Test to see if the model can get its user.
     */
    public function test_review_model_can_get_user(): void
    {
        assertInstanceOf(User::class, $this->review->user()->first());
    }
}
