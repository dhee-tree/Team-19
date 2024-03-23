<?php

namespace Tests\Feature\Controllers;

use App\Models\Category;
use Tests\TestCase;
use App\Models\User;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;

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
        $this->products = Product::factory(10)->create();
    }

    public function test_product_controller_can_show_product_show_page()
    {   
        $product = $this->products->shuffle()->first();

        //Assigning a category to get similar products.
        $product->categories()->attach(Category::factory()->create()->id);

        $response = $this->get('product/'.$product->id);

        $response->assertSuccessful();
        $response->assertViewIs('products.show');
        Artisan::call('migrate:fresh --env=testing');
    }


    public function test_product_controller_can_show_product_index_page()
    {
        $response = $this->get(route('products.filter'));
        
        $response->assertSuccessful();
        $response->assertViewIs('product-list');
    }

    public function test_product_controller_can_show_product_index_page_with_category_filter()
    {   
        $categories = Category::factory()->count(6)->sequence(
            ['category' => 'Test', 'images' => '/'],
            ['category' => 'Dining', 'images' => '/images/Dining-room.png'],
            ['category' => 'Bedroom', 'images' => '/images/Bedroom.png'],
            ['category' => 'Bathroom', 'images' => '/images/Bathroom.png'],
            ['category' => 'Office', 'images' => '/images/Office.png'],
            ['category' => 'Garden', 'images' => '/images/Garden.png'],
            //etc...
        )->create();

        //Gives a product a random category.
        foreach ($this->products as $product) {
            $product->categories()->attach(rand(1, $categories->count()));
        }

        //Product should have the category name of 'Test'
        Product::factory()->create()->categories()->attach(1); 
        //Additional as assurance.
        Product::factory()->create()->categories()->attach(1); 

        //Product with a different category name.
        Product::factory()->create()->categories()->attach(2);

        $response = $this->get('products?sort_by=Select...&categories%5B%5D=Test&minCost=0&maxCost=10000');
        $products = $response->viewData('products');

        $response->assertSuccessful();
        $response->assertViewIs('product-list');

        foreach($products as $product){
            $this->assertEquals('Test', $product->categories()->first()->category);
        }
    }

    public function test_product_controller_can_show_product_index_page_with_price_filter()
    {   
        //Product with a price within filter range
        Product::factory()->create([
            'cost' => 110,
            'discount' => 25
        ]);

        //Product with price higher than filter range
        Product::factory()->create([
            'cost' => 200,
            'discount' => 30
        ]);

        //Product with price lower than filter range
        Product::factory()->create([
            'cost' => 60,
            'discount' => 50
        ]); 

        $response = $this->get('products?sort_by=Select...&minCost=50&maxCost=100'); //Filter uses discounted price
        $products = $response->viewData('products');

        $response->assertSuccessful();
        $response->assertViewIs('product-list');

        foreach($products as $product){
            $finalCost = $product->cost - ($product->cost * ($product->discount / 100));
            $this->assertTrue($finalCost <= 100 && $finalCost >=50);
        }
    }

    /*
    RATINGS DO NOT WORK
    public function test_product_controller_can_show_product_index_page_with_rating_filter()
    {   
        User::factory(10)->create();
        Review::factory(500)->create();

        //Product with a review score below filter range
        Product::factory()->create([]);

        //Product with a review score within filter range
        Product::factory()->create([]);

        //Product with a review score above filter range
        Product::factory()->create([]);

        $response = $this->get('products?sort_by=Select...&minCost=50&maxCost=100'); //Filter uses discounted price
        $products = $response->viewData('products');

        $response->assertSuccessful();
        $response->assertViewIs('product-list');

        foreach($products as $product){
            //$this->assertTrue($product->reviews()->sum('rating') >= 4);
        }
    }
    */
}
