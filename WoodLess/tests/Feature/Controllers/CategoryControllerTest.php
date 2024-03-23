<?php

namespace Tests\Feature\Controllers;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if categories are displayed on the categories page.
     *
     * @return void
     */
    public function test_categories_are_displayed_on_categories_page()
    {
        // Given some categories exist in the database
        $categories = Category::factory()->count(7)->create();

        // When a user visits the categories page
        $response = $this->get('/categories');

        // Then they should see the categories displayed on the page
        $response->assertStatus(200)
                 ->assertViewIs('categories'); // Assert that the view is correct

        foreach ($categories as $category) {
            $response->assertSee($category->name); // Assert that each category name is visible
        }
    }
}
