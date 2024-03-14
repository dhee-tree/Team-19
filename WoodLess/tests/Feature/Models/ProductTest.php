<?php

namespace Tests\Feature;

use App\Models\Basket;
use Tests\TestCase;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function PHPUnit\Framework\assertInstanceOf;

class ProductTest extends TestCase
{   
    use RefreshDatabase;
    protected $product;

    /**
     * Set up the review before each test.
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->product = Product::factory()->create();
    }

    /**
     * Test to see if the model can get baskets.
     */
    public function test_product_model_can_get_baskets(): void
    {
        $this->product->baskets()->attach(User::factory()->create()->basket->id);
        assertInstanceOf(Basket::class, $this->product->baskets()->first());
    }

    /**
     * Test to see if the model can get reviews.
     */
    public function test_product_model_can_get_reviews(): void
    {   
        
        $this->product->reviews()->attach(
            Review::factory()->create([
            'user_id' => User::factory()->create()->id,
        ])->id);
        assertInstanceOf(Review::class, $this->product->reviews()->first());
    }
}
