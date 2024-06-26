<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Get a random user from the database
        $user = User::inRandomOrder()->first();

        // Use the user's ID
        $user_id = $user->id;

        // Get a random address associated with the user
        $address = $user->addresses()->inRandomOrder()->first();



        // Use the address ID
        $address_id = $address->id;
        // Inside your seeder class method

        // Generate a random status ID (example: between 1 and 5)
        $status_id = $this->faker->numberBetween(1, 6);

        return [
            'user_id' => $user_id,
            'address_id' => $address_id,
            'status_id' => $status_id,
            'details' => $this->faker->sentence,
            // Optionally, generate timestamps
            // 'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            // 'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
