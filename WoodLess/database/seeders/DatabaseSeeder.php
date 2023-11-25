<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {   
        
        \App\Models\User::factory(10)->create();
        $products =\App\Models\Product::factory(10)->create();

        //ADD CATEGORIES HERE. INCREMENT COUNT BY NO. OF CATEGORIES.
        $categories = \App\Models\Category::factory()->count(2)->sequence(
            ['category' => 'Home'],
            ['category' => 'Kitchen'],
            //etc...
        )->create();
        
        //Gives a product a random category.
        foreach ($products as $product){
            $product->categories()->attach(rand(1, $categories->count()));
        }
        
        //Creates 500 Random Reviews.
        \App\Models\Review::factory(500)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
