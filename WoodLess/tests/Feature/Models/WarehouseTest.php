<?php

namespace Tests\Feature\Models;

use Tests\TestCase;
use App\Models\Product;
use App\Models\Warehouse;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WarehouseTest extends TestCase
{
    use RefreshDatabase;
    protected Warehouse $warehouse;

    /**
     * Set up the warehouse before each test.
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->warehouse = Warehouse::factory()->create();
    }

    /**
     * Test to see if the model can get products.
     */
    public function test_warehouse_model_can_get_products(): void
    {
        $this->warehouse->products()->attach(Product::factory(['title' => 'test'])->create());

        $product = $this->warehouse->products()->first();

        $this->assertInstanceOf(Product::class, $product);
        $this->assertEquals('test', $product->title);
    }
}
