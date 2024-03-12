<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Order;
use App\Models\Basket;
use App\Models\Address;
use App\Models\Card;
use App\Models\Product;
use App\Models\Warehouse;
use App\Models\OrderStatus;
use App\Models\Review;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{  
    use RefreshDatabase;
    protected $user;

    /**
     * Set up the user before each test.
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    /**
     * Test if the user has a basket.
     */
    public function test_user_has_basket(): void
    {   
        $this->assertInstanceOf(Basket::class, $this->user->basket);
    }

    /**
     * Test if the user has orders.
     */
    public function test_user_has_orders(): void
    {   
        Order::create([
            'user_id' => $this->user->id,
            'address_id' => Address::factory()->create()->id,
            'status_id' => OrderStatus::create(['status' => 'test'])->id,
            'details' => 'Order placed by user',
            'order_cost' => 0,
        ]);

        $this->assertInstanceOf(Order::class, $this->user->orders->first());
    }

    /**
     * Test if the user has reviews.
     */
    public function test_user_has_reviews(): void
    {   
        $this->user->reviews()->create([
            'product_id' => Product::factory()->create()->id,
            'rating' => 5,
            'description' => 'Test'  
        ]);

        $this->assertInstanceOf(Review::class, $this->user->reviews->first());
    }

    /**
     * Test if the user has addresses.
     */
    public function test_user_has_addresses(): void
    {   
        Address::factory()->create([
            'user_id' => $this->user->id
        ]);
        $this->assertInstanceOf(Address::class, $this->user->addresses->first());
    }

    /**
     * Test if the user has cards.
     */
    public function test_user_has_cards(): void
    {   
        Card::factory()->create([
            'user_id' => $this->user->id
        ]);

        $this->assertInstanceOf(Card::class, $this->user->cards->first());
    }

    /**
     * Test if the user is not an admin.
     */
    public function test_user_is_not_admin(): void
    {   
        $this->assertFalse((bool)($this->user->isAdmin()));
    }

    /**
     * Test if the user is not an admin.
     */
    public function test_make_user_admin_and_check_access_level(): void
    {   
        $this->user->access_level = 3;
        $this->user->save();

        $this->assertTrue((bool)($this->user->isAdmin()));
        $this->assertTrue((bool)($this->user->accessLevel() >= 3));
    }
}
