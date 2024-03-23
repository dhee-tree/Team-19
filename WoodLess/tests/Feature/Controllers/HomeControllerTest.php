<?php

namespace Tests\Feature\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if the index method returns the welcome view with categories and products.
     *
     * @return void
     */
    public function test_index_returns_welcome_view_with_categories_and_products()
    {
        // Given some categories and products exist in the database
        $categories = Category::factory()->count(3)->create();
        $products = Product::factory()->count(5)->create();

        // When a user visits the home page
        $response = $this->get('/');

        // Then they should see the welcome view with categories and products
        $response->assertStatus(200)
                 ->assertViewIs('welcome') // Assert that the view is correct
                 ->assertViewHas('categories', $categories) // Assert that categories are passed to the view
                 ->assertViewHas('products', $products); // Assert that products are passed to the view
    }
}
