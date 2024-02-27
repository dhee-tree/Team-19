<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $warehouses = \App\Models\Warehouse::factory(3)->create();

        // Default image URL
        $defaultUserImageUrl = 'https://placehold.co/250x300';

        // Seed the importance_levels table
        DB::table('importance_levels')->insert([
            ['level' => 'Low'],
            ['level' => 'Medium'],
            ['level' => 'High'],
        ]);
        // Create 50 users
        $users = \App\Models\User::factory(50)->create([
            'image' => $defaultUserImageUrl, // Set the default image URL
        ]);
        //$products =\App\Models\Product::factory(20)->create();

        //ADD CATEGORIES HERE. INCREMENT COUNT BY NO. OF CATEGORIES.
        $categories = \App\Models\Category::factory()->count(6)->sequence(
            ['category' => 'Kitchen', 'images' => '/images/Kitchen.png'],
            ['category' => 'Dining', 'images' => '/images/Dining-room.png'],
            ['category' => 'Bedroom', 'images' => '/images/Bedroom.png'],
            ['category' => 'Bathroom', 'images' => '/images/Bathroom.png'],
            ['category' => 'Office', 'images' => '/images/Office.png'],
            ['category' => 'Garden', 'images' => '/images/Garden.png'],
            //etc...
        )->create();

        //ADD ORDER STATUSES HERE. INCREMENT COUNT BY NO. OF STATUSES.
        $orderStatuses = \App\Models\OrderStatus::factory()->count(6)->sequence(
            ['status' => 'Processing'],
            ['status' => 'Transit'],
            ['status' => 'Complete'],
            ['status' => 'Processing Return'],
            ['status' => 'Return Complete'],
            ['status' => 'Refunded'],
            //etc...
        )->create();

        $importanceLevel = \App\Models\ImportanceLevel::factory()->count(3)->sequence(
            ['level' => 'Low'],
            ['level' => 'Medium'],
            ['level' => 'High'],
            //etc...
        )->create();

        $products = \App\Models\Product::factory()->count(30)->sequence(
            ['title' => 'Rivulet', 'description' => 'Embrace sustainable comfort with the Rivulet chair, crafted from recycled plastics. Its sleek design and ergonomic features make it an eco-conscious choice for modern living spaces.', 'images' => 'images/products/1/(1).png,images/products/1/(2).png,images/products/1/(3).png'],
            ['title' => 'Lagoon', 'description' => 'Experience the perfect blend of style and sustainability with the Lagoon chair. Created using innovative plastic recycling, these chairs redefine eco-friendly seating, combining elegance with environmental responsibility.', 'images' => 'images/products/2/(1).png,images/products/2/(2).png,images/products/2/(3).png'],
            ['title' => 'Seep', 'description' => 'Infuse your space with eco-chic vibes using the Seep table, crafted from upcycled plastics, these tables boast durability and contemporary design, making them the ideal choice for socially conscious interiors.', 'images' => 'images/products/3/(1).png,images/products/3/(2).png,images/products/3/(3).png'],
            ['title' => 'Inlet', 'description' => 'Elevate your living space with the Inlet table, where artistry meets sustainability. Handcrafted from recycled plastics, these tables showcase unique textures, colors, and eco-friendly elegance for your home.', 'images' => 'images/products/4/(1).png,images/products/4/(2).png,images/products/4/(3).png'],
            ['title' => 'Cove', 'description' => 'Revolutionize your storage solutions with the Cove storage cabinet. Meticulously crafted from recycled plastics, this environmentally conscious cupboard combines functionality with a touch of eco-modern sophistication.', 'images' => 'images/products/5/(1).png,images/products/5/(2).png,images/products/5/(3).png'],
            ['title' => 'Barachois', 'description' => 'Redefine your living space with the Barachois cupboard. This sustainably crafted wardrobe, made from recycled materials, offers a harmonious blend of style and environmental responsibility, creating a chic haven for your belongings.', 'images' => 'images/products/6/(1).png,images/products/6/(2).png,images/products/6/(3).png'],
            ['title' => 'Bight', 'description' => 'Dive into eco-luxury with the Bight sofa, a masterpiece of sustainable design. Crafted from upcycled plastics, this sofa marries plush comfort with environmental responsibility, creating a stylish retreat for mindful living.', 'images' => 'images/products/7/(1).png,images/products/7/(2).png,images/products/7/(3).png'],
            ['title' => 'Port', 'description' => 'Experience the epitome of green comfort with the outdoor Port seater. Immerse yourself in its soft, recycled fabric embrace, knowing that sustainability and style coexist in this thoughtfully designed sofa.', 'images' => 'images/products/8/(1).png,images/products/8/(2).png,images/products/8/(3).png'],
            ['title' => 'Tarn', 'description' => 'Transform your bedroom into a haven of sustainability with the Tarn bedframe. Crafted from recycled plastics, this bedframe seamlessly blends comfort and environmental consciousness, ensuring restful nights with a clear conscience.', 'images' => 'images/products/9/(1).png,images/products/9/(2).png,images/products/9/(3).png'],
            ['title' => 'Gill', 'description' => "Elevate your children's space with the Gill bunk bed, a whimsical and eco-friendly sleep solution. Constructed from recycled materials, it combines playful design with the assurance of a sustainable future.", 'images' => 'images/products/10/(1).png,images/products/10/(2).png,images/products/10/(3).png'],
            ['title' => 'Gulf', 'description' => 'Organize in style with the Gulf storage drawers, an eco-chic storage solution. Made from upcycled plastics, its multiple drawers offer ample space while adding a touch of sustainable elegance to your living space.', 'images' => 'images/products/11/(1).png,images/products/11/(2).png,images/products/11/(3).png'],
            ['title' => 'Reservoir', 'description' => 'Redefine bedroom storage with the Reservoir dresser. Crafted from recycled materials, its sleek design and spacious drawers provide a perfect blend of functionality and eco-conscious sophistication.', 'images' => 'images/products/12/(1).png,images/products/12/(2).png,images/products/12/(3).png'],
            ['title' => 'Aqua Sofa', 'description' => 'Enhance your living space with this versatile and functional furniture.', 'images' => 'images/products/13/(1).png,images/products/13/(1).png,images/products/13/(1).png'],
            ['title' => 'Cerulean Chair', 'description' => 'Create a haven of peace with this chic and elegant furniture item.', 'images' => 'images/products/14/(1).png,images/products/14/(2).png,images/products/14/(3).png'],
            ['title' => 'Tranquil Desk', 'description' => 'Experience ultimate relaxation with this stylish and ergonomic furniture.', 'images' => 'images/products/15/(1).png,images/products/15/(2).png,images/products/15/(3).png'],
            ['title' => 'River Lounge', 'description' => 'Feel the rush of nature with this nature-inspired and comfortable furniture.', 'images' => 'images/products/16/(1).png,images/products/16/(2).png,images/products/16/(3).png'],
            ['title' => 'Aqua Bed', 'description' => 'Designed for both style and substance, this furniture piece is a perfect addition to modern living spaces.', 'images' => 'images/products/17/(1).png,images/products/17/(2).png,images/products/17/(3).png'],
            ['title' => 'Serenity Couch', 'description' => 'Embrace sustainable comfort with this eco-conscious furniture piece.', 'images' => 'images/products/18/(1).png,images/products/18/(2).png,images/products/18/(3).png'],
            ['title' => 'Breeze Table', 'description' => 'Blend elegance with modern aesthetics using this carefully designed furniture.', 'images' => 'images/products/19/(1).png,images/products/19/(2).png,images/products/19/(3).png'],
            ['title' => 'Ocean Sofa', 'description' => 'Transform your space into a sanctuary of tranquility with this beautifully crafted piece.', 'images' => 'images/products/20/(1).png,images/products/20/(2).png,images/products/20/(3).png'],
            ['title' => 'Serenity Ottoman', 'description' => 'Enhance your living space with this versatile and functional furniture.', 'images' => 'images/products/21/(1).png,images/products/21/(2).png,images/products/21/(3).png'],
            ['title' => 'Cerulean Bed', 'description' => 'Create a haven of peace with this chic and elegant furniture item.', 'images' => 'images/products/22/(1).png,images/products/22/(2).png,images/products/22/(3).png'],
            ['title' => 'Tranquil Desk', 'description' => 'Experience ultimate relaxation with this stylish and ergonomic furniture.', 'images' => 'images/products/23/(1).png,images/products/23/(2).png,images/products/23/(3).png'],
            ['title' => 'River Cupboard', 'description' => 'Feel the rush of nature with this nature-inspired and beautiful furniture.', 'images' => 'images/products/24/(1).png,images/products/24/(2).png,images/products/24/(3).png'],
            ['title' => 'Aqua Chair', 'description' => 'Designed for both style and substance, this furniture piece is a perfect addition to modern living spaces.', 'images' => 'images/products/25/(1).png,images/products/25/(2).png,images/products/25/(3).png'],
            ['title' => 'Serenity Ottoman', 'description' => 'Embrace sustainable comfort with this eco-conscious furniture piece.', 'images' => 'images/products/26/(1).png,images/products/26/(2).png,images/products/26/(3).png'],
            ['title' => 'Breeze Lounge', 'description' => 'Blend elegance with modern aesthetics using this carefully designed furniture.', 'images' => 'images/products/27/(1).png,images/products/27/(2).png,images/products/27/(3).png'],
            ['title' => 'Ocean Table', 'description' => 'Transform your space into a sanctuary of tranquility with this beautifully crafted piece.', 'images' => 'images/products/28/(1).png,images/products/28/(2).png,images/products/28/(3).png'],
            ['title' => 'Rivulet Sofa', 'description' => 'Enhance your living space with this versatile and functional furniture.', 'images' => 'images/products/29/(1).png,images/products/29/(2).png,images/products/29/(3).png'],
            ['title' => 'Cerulean Chair', 'description' => 'Create a haven of peace with this chic and elegant furniture item.', 'images' => 'images/products/30/(1).png,images/products/30/(2).png,images/products/30/(3).png']
        )->create();



        //Gives a product a random category.
        foreach ($products as $product) {
            $product->categories()->attach(rand(1, $categories->count()));
        }

        //Adds products to warehouses
        foreach ($products as $product) {
            for ($i = 0; $i < $warehouses->count(); $i++) {
                $product->warehouses()->attach($i + 1, ['amount' => 100]);
            }
        }

        //Creates 500 Random Reviews.
        \App\Models\Review::factory(500)->create();

        //Give user a basket and address.
        foreach ($users as $user) {
            if (!($user->basket)) {
                $user->basket()->create();
            }

            \App\Models\Address::factory()->create(['user_id' => $user->id]);
            \App\Models\Card::factory()->create(['user_id' => $user->id]);
        }

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //create 500 tickets
        \App\Models\Ticket::factory()->count(500)->create();
    }
}
