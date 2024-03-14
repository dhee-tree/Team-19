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

use function PHPUnit\Framework\assertEquals;
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
        assertInstanceOf(Basket::class, $this->product->baskets()->first());
    }

    /**
     * Test to see if the model can get reviews.
     */
    public function test_product_model_can_get_reviews(): void
    {   
        Review::factory()->create([
            'user_id' => User::factory()->create()->id,
            'product_id' => $this->product->id
        ]);
        assertInstanceOf(Review::class, $this->product->reviews()->first());
    }

    /**
     * Test to see if the model can get warehouses.
     */
    public function test_product_model_can_get_warehouses_and_set_stock(): void
    {   
        $warehouse = Warehouse::factory()->create();
        $this->product->warehouses()->attach($warehouse->id);
        assertInstanceOf(Warehouse::class, $this->product->warehouses()->first());

        $this->product->setStockAmount($warehouse->id, 20);
        assertEquals(20, $this->product->stockAmount($warehouse->id));
    }

    /**
     * Test to see if the model can get categories.
     */
    public function test_product_model_can_get_categories(): void
    {   
        $category = Category::factory()->create(['images' => '']);
        $this->product->categories()->attach($category->id);
        assertInstanceOf(Category::class, $this->product->categories()->first());
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
