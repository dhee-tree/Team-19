<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
        return [
            'user_id' => User::first()->id,
            'house_number' => $this->faker->numberBetween(1,100),
            'street_name' => $this->faker->streetName(),
            'postcode' => $this->faker->postcode(),
            'city' => $this->faker->city(),
        ];
    }
}
