<?php

namespace Tests\Feature\Controllers;

use Tests\TestCase;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    use RefreshDatabase;
    protected $user;
    protected $products;

    /**
     * Set up the Controller before each test.
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
        $this->products = Product::factory(10)->create();
        $this->actingAs($this->user);
    }


    public function test_product_controller_can_show_product_index_page()
    {
        $response = $this->get(route('products.filter'));
        
        $response->assertSuccessful();
        $response->assertViewIs('product-list');
    }
}
