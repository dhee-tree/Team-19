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
        //$products =\App\Models\Product::factory(20)->create();

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

        $products = \App\Models\Product::factory()->count(12)->sequence(
            ['title' =>'Rivulet','description'=>'Embrace sustainable comfort with the Rivulet chair, crafted from recycled plastics. Its sleek design and ergonomic features make it an eco-conscious choice for modern living spaces.','images'=>'products/1/(1).png,products/1/(2).png,products/1/(3).png'],              
            ['title' =>'Lagoon','description'=>'Experience the perfect blend of style and sustainability with the Lagoon chair. Created using innovative plastic recycling, these chairs redefine eco-friendly seating, combining elegance with environmental responsibility.','images'=>'products/2/(1).png,products/2/(2).png,products/2/(3).png'],              
            ['title' =>'Seep','description'=>'Infuse your space with eco-chic vibes using the Seep table, crafted from upcycled plastics, these tables boast durability and contemporary design, making them the ideal choice for socially conscious interiors.','images'=>'products/3/(1).png,products/3/(2).png,products/3/(3).png'],              
            ['title' =>'Inlet','description'=>'Elevate your living space with the Inlet table, where artistry meets sustainability. Handcrafted from recycled plastics, these tables showcase unique textures, colors, and eco-friendly elegance for your home.','images'=>'products/4/(1).png,products/4/(2).png,products/4/(3).png'],              
            ['title' =>'Cove','description'=>'Revolutionize your storage solutions with the Cove storage cabinet. Meticulously crafted from recycled plastics, this environmentally conscious cupboard combines functionality with a touch of eco-modern sophistication.','images'=>'products/5/(1).png,products/5/(2).png,products/5/(3).png'],              
            ['title' =>'Barachois','description'=>'Redefine your living space with the Barachois cupboard. This sustainably crafted wardrobe, made from recycled materials, offers a harmonious blend of style and environmental responsibility, creating a chic haven for your belongings.','images'=>'products/6/(1).png,products/6/(2).png,products/6/(3).png'],    
            ['title' =>'Bight','description'=>'Dive into eco-luxury with the Bight sofa, a masterpiece of sustainable design. Crafted from upcycled plastics, this sofa marries plush comfort with environmental responsibility, creating a stylish retreat for mindful living.','images'=>'products/7/(1).png,products/7/(2).png,products/7/(3).png'],              
            ['title' =>'Port','description'=>'Experience the epitome of green comfort with the outdoor Port seater. Immerse yourself in its soft, recycled fabric embrace, knowing that sustainability and style coexist in this thoughtfully designed sofa.','images'=>'products/8/(1).png,products/8/(2).png,products/8/(3).png'],              
            ['title' =>'Tarn','description'=>'Transform your bedroom into a haven of sustainability with the Tarn bedframe. Crafted from recycled plastics, this bedframe seamlessly blends comfort and environmental consciousness, ensuring restful nights with a clear conscience.','images'=>'products/9/(1).png,products/9/(2).png,products/9/(3).png'],              
            ['title' =>'Gill','description'=>"Elevate your children's space with the Gill bunk bed, a whimsical and eco-friendly sleep solution. Constructed from recycled materials, it combines playful design with the assurance of a sustainable future.",'images'=>'products/10/(1).png,products/10/(2).png,products/10/(3).png'],              
            ['title' =>'Gulf','description'=>'Organize in style with the Gulf storage drawers, an eco-chic storage solution. Made from upcycled plastics, its multiple drawers offer ample space while adding a touch of sustainable elegance to your living space.','images'=>'products/11/(1).png,products/11/(2).png,products/11/(3).png'],              
            ['title' =>'Reservoir','description'=>'Redefine bedroom storage with the Reservoir dresser. Crafted from recycled materials, its sleek design and spacious drawers provide a perfect blend of functionality and eco-conscious sophistication.','images'=>'products/12/(1).png,products/12/(2).png,products/12/(3).png'],          
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