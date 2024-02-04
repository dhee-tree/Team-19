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
            'house_number' => fake()->numberBetween(1,100),
            'street_name' => fake()->streetAddress(),
            'postcode' => fake()->postcode(),
            'city' => fake()->city(),
        ];
    }
}
