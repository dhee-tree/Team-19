<?php

namespace Tests\Feature\Models;

use Tests\TestCase;
use App\Models\User;
use App\Models\Order;
use App\Models\Address;
use App\Models\OrderStatus;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrderStatusTest extends TestCase
{
    use RefreshDatabase;
    protected OrderStatus $orderStatus;

    /**
     * Set up the order status before each test.
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->orderStatus = OrderStatus::create(['status' => 'test']);
    }

    /**
     * Test to see if the model can its orders.
     */
    public function test_order_status_model_can_get_orders(): void
    {
        Order::create([
            'user_id' => User::factory()->create()->id,
            'address_id' => Address::factory()->create()->id,
            'status_id' => $this->orderStatus->id,
            'details' => 'test',
            'order_cost' => 0,
        ]);

        $order = $this->orderStatus->orders->first();

        $this->assertInstanceOf(Order::class, $order);
        $this->assertEquals('test', $order->details);
    }
}
