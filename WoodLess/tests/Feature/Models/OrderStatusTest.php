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

class OrderStatusTest extends TestCase
{
    use RefreshDatabase;
    protected $orderStatus;

    /**
     * Set up the review before each test.
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
        $this->withExceptionHandling();
        Order::create([
            'user_id' => User::factory()->create()->id,
            'address_id' => Address::factory()->create()->id,
            'status_id' => $this->orderStatus->id,
            'details' => 'Order placed by user',
            'order_cost' => 0,
        ]);

        assertInstanceOf(Order::class, $this->orderStatus->orders->first());
    }
}
