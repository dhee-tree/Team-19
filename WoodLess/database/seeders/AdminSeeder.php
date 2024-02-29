<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //create 500 tickets
        \App\Models\Ticket::factory()->count(500)->create();
        
        //create 100 orders
        \App\Models\Order::factory()->count(100)->create();

    }
}
