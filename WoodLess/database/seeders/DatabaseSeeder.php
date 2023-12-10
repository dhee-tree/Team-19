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
        
        $users =\App\Models\User::factory(50)->create();
        $products =\App\Models\Product::factory(20)->create();

        //ADD CATEGORIES HERE. INCREMENT COUNT BY NO. OF CATEGORIES.
        $categories = \App\Models\Category::factory()->count(6)->sequence(
            ['category' => 'Kitchen','images'=>'/images/Kitchen.png'],              
            ['category' => 'Dining','images'=>'/images/Dining-room.png'],
            ['category' => 'Bedroom','images'=>'/images/Bedroom.png'],
            ['category' => 'Bathroom','images'=>'/images/Bathroom.png'],
            ['category'=> 'Office','images'=>'/images/Office.png'],
            ['category'=> 'Garden','images'=>'/images/Garden.png'],
            //etc...
        )->create();
        
        //Gives a product a random category.
        foreach ($products as $product){
            $product->categories()->attach(rand(1, $categories->count()));
        }
        
        //Creates 500 Random Reviews.
        \App\Models\Review::factory(500)->create();

        //Give user a basket.
        foreach ($users as $user) {
            if(!($user->basket)){
                $user->basket()->create();
            }
        }

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}