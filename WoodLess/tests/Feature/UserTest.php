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

use function PHPUnit\Framework\assertNull;

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
     * Test if a basket was created alongside the user.
     */
    public function test_creating_user_creates_basket(): void
    {   
        $this->assertInstanceOf(Basket::class, $this->user->basket);
    }

    /**
     * Test if the user can get orders.
     */
    public function test_user_can_get_orders(): void
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
     * Test if the user can get reviews.
     */
    public function test_user_can_get_reviews(): void
    {   
        $this->user->reviews()->create([
            'product_id' => Product::factory()->create()->id,
            'rating' => 5,
            'description' => 'Test'  
        ]);

        $this->assertInstanceOf(Review::class, $this->user->reviews->first());
    }

    /**
     * Test if the user can get addresses.
     */
    public function test_user_can_get_addresses(): void
    {   
        Address::factory()->create([
            'user_id' => $this->user->id
        ]);
        $this->assertInstanceOf(Address::class, $this->user->addresses->first());
    }

    /**
     * Test if the user can get cards.
     */
    public function test_user_can_get_cards(): void
    {   
        Card::factory()->create([
            'user_id' => $this->user->id
        ]);

        $this->assertInstanceOf(Card::class, $this->user->cards->first());
    }

    /**
     * Test if the user is not an admin.
     */
    public function test_user_can_check_admin_privileges(): void
    {   
        $this->assertFalse((bool)($this->user->isAdmin()));
    }

    /**
     * Test if the user has an elavated access level.
     */
    public function test_user_can_get_access_level(): void
    {   
        $this->user->access_level = 3;
        $this->user->save();
        $this->assertTrue((bool)($this->user->accessLevel() >= 3));
    }

    /**
     * Test if deleting the user deletes the basket.
     */
    public function test_deleting_user_deletes_basket(): void
    {   
        $id = $this->user->id;
        $this->user->delete();
        assertNull(Basket::where('user_id', '=', (string)($id))->first());
    }
}
