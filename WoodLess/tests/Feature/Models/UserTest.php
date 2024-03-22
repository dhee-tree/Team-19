<?php

namespace Tests\Feature\Models;

use Tests\TestCase;
use App\Models\User;
use App\Models\Order;
use App\Models\Basket;
use App\Models\Address;
use App\Models\Card;
use App\Models\Product;
use App\Models\OrderStatus;
use App\Models\Review;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{  
    use RefreshDatabase;
    protected User $user;

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
    public function test_user_model_creation_creates_basket(): void
    {   
        $basket = $this->user->basket;
        $this->assertInstanceOf(Basket::class, $basket);
        $this->assertEquals($this->user->id, $basket->user_id);
    }

    /**
     * Test if the user can get orders.
     */
    public function test_user_model_can_get_orders(): void
    {   
        Order::create([
            'user_id' => $this->user->id,
            'address_id' => Address::factory()->create()->id,
            'status_id' => OrderStatus::create(['status' => 'test'])->id,
            'details' => 'test of details',
            'order_cost' => 0,
        ]);
        
        $orders = $this->user->orders->first();

        $this->assertInstanceOf(Order::class, $orders);
        $this->assertEquals('test of details', $orders->details);
    }

    /**
     * Test if the user can get reviews.
     */
    public function test_user_model_can_get_reviews(): void
    {   
        $this->user->reviews()->create([
            'product_id' => Product::factory()->create()->id,
            'rating' => 3,
            'description' => 'test of description'  
        ]);

        $reviews = $this->user->reviews->first();

        $this->assertInstanceOf(Review::class, $reviews);
        $this->assertEquals('test of description', $reviews->description);
    }

    /**
     * Test if the user can get addresses.
     */
    public function test_user_model_can_get_addresses(): void
    {   
        Address::factory()->create([
            'user_id' => $this->user->id
        ]);

        $address = $this->user->addresses->first();

        $this->assertInstanceOf(Address::class, $address);
        $this->assertEquals($this->user->id, $address->user_id);
    }

    /**
     * Test if the user can get cards.
     */
    public function test_user_model_can_get_cards(): void
    {   
        Card::factory()->create([
            'user_id' => $this->user->id
        ]);

        $card = $this->user->cards->first();

        $this->assertInstanceOf(Card::class, $card);
        $this->assertEquals($this->user->id, $card->user_id);
    }

    /**
     * Test if the user is not an admin.
     */
    public function test_user_model_without_admin_privileges(): void
    {   
        $this->assertFalse((bool)($this->user->isAdmin()));
    }

    /**
     * Test if the user has an elevated access level.
     */
    public function test_user_model_can_get_access_level(): void
    {   
        $this->user->access_level = 3;
        $this->user->save();
        $this->assertTrue((bool)($this->user->accessLevel() >= 3));
    }

    /**
     * Test if deleting the user deletes the basket.
     */
    public function test_user_model_deletion_creates_basket_model(): void
    {   
        $id = $this->user->id;
        $this->user->delete();
        $this->assertNull(Basket::where('user_id', '=', (string)($id))->first());
    }
}
