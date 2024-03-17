<?php

namespace Tests\Feature;

use App\Models\Warehouse;
use Tests\TestCase;
use App\Models\User;
use App\Models\Order;
use App\Models\Address;
use App\Models\OrderStatus;
use App\Models\Product;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrderTest extends TestCase
{
    use RefreshDatabase;
    protected Order $order;

    /**
     * Set up the model before each test.
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->order = Order::create([
            'user_id' => User::factory()->create(['last_name' => 'test'])->id,
            'address_id' => Address::factory()->create(['city' => 'test'])->id,
            'status_id' => OrderStatus::create(['status' => 'test'])->id,
            'details' => 'Order placed by user',
            'order_cost' => 0,
        ]);
    }

    /**
     * Test to see if the model can its user.
     */
    public function test_order_model_can_get_user(): void
    {
        $user = $this->order->user;
        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals('test', $user->last_name);
    }

    /**
     * Test to see if the model can its address.
     */
    public function test_order_model_can_get_address(): void
    {
        $address = $this->order->address;
        $this->assertInstanceOf(Address::class, $address);
        $this->assertEquals('test', $address->city);
    }

    /**
     * Test to see if the model can its products and quantity.
     */
    public function test_order_model_can_get_products_and_quantity(): void
    {
        $this->order->products()->attach(Product::factory()->create()->id, ['warehouse_id' => Warehouse::factory()->create()->id, 'attributes' => '{"color":"red"}', 'amount' => 5]);
        $this->order->products()->attach(Product::factory()->create()->id, ['warehouse_id' => Warehouse::factory()->create()->id, 'attributes' => '{"color":"green"}', 'amount' => 5]);
        
        $this->assertInstanceOf(Product::class, $this->order->products()->first());
        $this->assertEquals(10, $this->order->totalOrderedQuantity());
    }

    /**
     * Test to see if the model can its order status.
     */
    public function test_order_model_can_get_status(): void
    {
        $status = $this->order->status()->first();
        $this->assertInstanceOf(OrderStatus::class, $status);
        $this->assertEquals('test', $status->status);
    }
}
