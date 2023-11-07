<?php

//Creates Dummy Data for database; used for models(?)
namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->colorName(),
            'description' => fake()->paragraph(5),
            'attributes' => json_encode(["0" => fake()->word(), "1" => fake()->word()]),
            'tags' => json_encode(["0" => fake()->word(), "1" => fake()->word()]),
            'categories' => fake()->word() . ',' . fake()-> word(),
            'cost' => fake()->numberBetween(10, 500),
            'discount' => fake()->numberBetween(10,50),
            'amount' => fake()->numberBetween(10,0),
        ];
    }
}
