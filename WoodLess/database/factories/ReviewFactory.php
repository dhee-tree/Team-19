<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {   
        $sizes = ['S', 'M', 'L'];
        return [
            'title' => fake()->colorName(),
            'rating' => fake()->numberBetween(1,5),
            'description' => fake()->paragraph(5),
            'attributes' => json_encode(["colour" => fake()->colorName(), "size" => $sizes[rand(0, count($sizes) -1)]]),
            'user_id' => fake()->numberBetween(1, 10),
            'product_id' => fake()->numberBetween(1, 10),
        ];
    }
}
