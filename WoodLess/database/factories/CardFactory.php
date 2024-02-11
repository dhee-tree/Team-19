<?php

namespace Database\Factories;

use App\Models\Card;
use Illuminate\Database\Eloquent\Factories\Factory;

class CardFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Card::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'card_number' => fake()->creditCardNumber(),
            'expiry_date' => fake()->creditCardExpirationDate(),
            'house_number' => fake()->numberBetween(1, 100),
            'street_name' => fake()->streetName(),
            'postcode' => fake()->postcode(),
            'city' => fake()->city(),
        ];
    }
}
