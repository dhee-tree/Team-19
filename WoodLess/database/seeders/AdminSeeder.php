<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\Product;
use App\Models\Warehouse;
use Faker\Factory as Faker;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        //create 500 tickets
        \App\Models\Ticket::factory()->count(500)->create();

        //create 100 orders
        \App\Models\Order::factory()->count(100)->create();

        // Create 100 product_order_warehouse records
        for ($i = 0; $i < 100; $i++) {
            // Generate and insert data into the product_warehouse table

            // Get a random order ID from the database
            $order_id = Order::inRandomOrder()->first()->id;

            // Get a random product ID from the database
            $product = Product::inRandomOrder()->first();

            $product_id = $product->id;

            // Get a random product ID from the database
            $warehouse_id = Warehouse::inRandomOrder()->first()->id;

            // Generate a random amount (example: between 1 and 100)
            $amount = $faker->numberBetween(1, 5);

            // Generate a random status ID (example: between 1 and 5)
            $status_id = $faker->numberBetween(1, 6);
            // Get the product attributes from the product model
            $productAttributes = $product->attributes;

            // Convert the product attributes JSON string to an associative array
            $attributesArray = json_decode($productAttributes, true);
            // Get the arrays of colors and sizes
            $colors = explode(',', $attributesArray['colour']);
            $sizes = explode(',', $attributesArray['size']);

            // Randomly choose one color and one size
            $randomColor = $colors[array_rand($colors)];
            $randomSize = $sizes[array_rand($sizes)];

            // Concatenate the chosen color and size into the attributes string
            $randomAttributes = json_encode(['color' => $randomColor, 'size' => $randomSize]);

            DB::table('order_product_warehouse')->insert([
                'order_id' => $order_id, // Replace with actual warehouse ID
                'warehouse_id' => $warehouse_id, // Replace with actual warehouse ID
                'product_id' => $product_id, // Replace with actual product ID
                'amount' => $amount,
                'attributes' => $randomAttributes,
                'created_at' => $createdAt = $faker->dateTimeBetween('-2 month', 'now'),
                'updated_at' => $faker->dateTimeBetween($createdAt, 'now'),
                'status_id' => $status_id
            ]);
        }
    }
}
