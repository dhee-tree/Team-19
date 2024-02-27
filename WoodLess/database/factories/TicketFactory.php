<?php

namespace Database\Factories;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TicketFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ticket::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => rand(1, 50), // Assuming you have users seeded already
            'admin_id' => null, // Assuming no admin initially
            'title' => $this->faker->sentence,
            'information' => $this->faker->paragraph,
            'contact' => $this->faker->phoneNumber,
            'importance_level_id' => rand(1, 3), // Assuming you have importance levels seeded already
            'status' => $this->faker->boolean, // Random true/false value
        ];
    }
}

