<?php

namespace Tests\Feature;

use App\Models\Basket;
use App\Models\Category;
use Tests\TestCase;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use App\Models\Warehouse;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{   
    use RefreshDatabase;
    protected Product $product;

    /**
     * Set up the model before each test.
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->product = Product::factory()->create([
            'description' => 'Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test'
        ]);
    }

    /**
     * Test to see if the model can get baskets.
     */
    public function test_product_model_can_get_baskets(): void
    {
        $this->product->baskets()->attach(User::factory()->create()->basket->id);
        $basket = $this->product->baskets()->first();

        $this->assertInstanceOf(Basket::class, $basket);

        $basket->products()->attach($this->product->id);
        $this->assertEquals($this->product->id, $basket->products->first()->id);
    }

    /**
     * Test to see if the model can get reviews.
     */
    public function test_product_model_can_get_reviews(): void
    {   
        Review::factory()->create([
            'user_id' => User::factory()->create()->id,
            'product_id' => $this->product->id,
            'description' => 'test'
        ]);

        $review = $this->product->reviews()->first();

        $this->assertInstanceOf(Review::class, $review);
        $this->assertEquals('test', $review->description);
    }

    /**
     * Test to see if the model can get warehouses.
     */
    public function test_product_model_can_get_warehouses_and_set_stock(): void
    {   
        $this->product->warehouses()->attach(Warehouse::factory()->create()->id);

        $warehouse = $this->product->warehouses()->first();
        $this->assertInstanceOf(Warehouse::class, $warehouse);

        $this->product->setStockAmount($warehouse->id, 20);
        $this->assertEquals(20, $this->product->stockAmount($warehouse->id));
    }

    /**
     * Test to see if the model can get categories.
     */
    public function test_product_model_can_get_categories(): void
    {   
        $this->product->categories()->attach(Category::factory()->create(['images' => '', 'category' => 'test'])->id);

        $category = $this->product->categories()->first();
        $this->assertInstanceOf(Category::class, $category);
        $this->assertEquals('test', $category->category);
    }

    /**
     * Test that the product model can get a truncated version of its description.
     */
    public function test_product_model_can_get_truncated_description(): void
    {
        $this->assertTrue(str_word_count($this->product->description) == 25);
        $this->assertTrue(str_word_count($this->product->truncateDescription()) == 20);
    }
}
