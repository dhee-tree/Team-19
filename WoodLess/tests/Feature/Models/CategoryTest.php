<?php

namespace Tests\Feature\Models;

use Tests\TestCase;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;
    protected Category $category;

    /**
     * Set up the model before each test.
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->category = Category::factory(['category' => 'test'])->create();
    }

    /**
     * Test to see if the model can its products.
     */
    public function test_category_model_can_get_products(): void
    {
        $this->category->products()->attach(Product::factory()->create(['title' => 'test'])->id);
        $product = $this->category->products()->first();

       $this->assertInstanceOf(Product::class, $product);
       $this->assertEquals('test', $product->title);
    }

    /**
     * Test to see if the model can get the default Category.
     */
    public function test_category_model_can_get_default_category(): void
    {
        $this->assertNull(Category::defaultCategory());

        $this->category->category = 'Default';
        $this->category->save();

        $this->assertEquals($this->category->id, Category::defaultCategory()->id);
    }
}
