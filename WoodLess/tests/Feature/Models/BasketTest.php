<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Basket;
use App\Models\User;
use App\Models\Product;

class BasketTest extends TestCase
{
    use RefreshDatabase;
    protected $product;
    protected $user;
    protected $basket;
    

    protected function setUp(): void
    {
        parent::setUp();
        $this->product = Product::factory()->create([
            'description' => 'Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test',
            'cost' => 100,
            'discount' => 10,
        ]);
        $this->user = User::factory()->create();  
        $this->basket = $this->user->basket->id;      
    }

    /**
     * Test to see if the model can get products.
     */
    public function test_basket_model_can_get_products()
    {
        $basket = Basket::find($this->basket);
        $basket->products()->attach($this->product);
        $this->assertInstanceOf(Product::class, $basket->products()->first());
        $this->assertEquals($this->product->id, $basket->products()->first()->id);
    }


    public function test_basket_model_can_get_user()
    {
        $user = $this->user;
        $basket = Basket::find($this->basket);

        $this->assertInstanceOf(User::class, $basket->user);
    }

    public function test_basket_model_can_get_total_cost_calculation()
    {
        $basket = Basket::find($this->basket);
        $product1 = $this->product;
        $product2 = Product::factory()->create([
            'cost' => 200,
            'discount' => 10,
        ]);
        
        $basket->products()->attach($product1);
        $basket->products()->attach($product2);

        // Expected total cost: (100 - 10%) + (200 - 20%) = 270
        $this->assertEquals(270, $basket->totalCost());
        $this->assertIsFloat($basket->totalCost());
    }
}

