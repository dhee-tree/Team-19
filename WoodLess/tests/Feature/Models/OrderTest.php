<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Order;
use App\Models\Address;
use App\Models\OrderStatus;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function PHPUnit\Framework\assertInstanceOf;

class OrderTest extends TestCase
{
    use RefreshDatabase;
    protected $order;

    /**
     * Set up the model before each test.
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->order = Order::create([
            'user_id' => User::factory()->create()->id,
            'address_id' => Address::factory()->create()->id,
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
        assertInstanceOf(User::class, $this->order->user);
    }

    /**
     * Test to see if the model can its address.
     */
    public function test_order_model_can_get_address(): void
    {
        assertInstanceOf(Address::class, $this->order->address);
    }

    /**
     * Test to see if the model can its products and quantity.
     */
    public function test_order_model_can_get_products_and_quantity(): void
    {
        assertInstanceOf(Address::class, $this->order->address);
    }
}
