<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Product;
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

        $product = Product::find(fake()->numberBetween(1, Product::count()));

        $positivePhrases = [
            'start1' => ['After using', 'When it comes to', 'My family loves', 'I love'],
            'start2' => ['I found', 'it was', 'this product is'],
            'advantage' => ['very effective', 'extremely useful', 'incredibly durable', 'amazingly versatile'],
            'feature' => ['the design', 'the quality', 'the performance', 'the functionality'],
            'end' => ['I highly recommend it.', 'I would definitely buy again.', 'It\'s a game-changer!', 'It\'s simply outstanding.'],
        ];
        
        $negativePhrases = [
            'start1' => ['I regret buying', 'Not satisfied with', 'Disappointed with', 'I wouldn\'t recommend'],
            'start2' => ['it\'s not', 'it is anything but', 'it is not', 'I was expecting it to be'],
            'advantage' => ['effective', 'useful', 'durable', 'reliable'],
            'feature' => ['the design', 'the quality', 'the performance', 'the price'],
            'end' => ['I wouldn\'t recommend it.', 'I won\'t be purchasing again.', 'It\'s not worth the price.', 'I was disappointed.'],
        ];
        
        $neutralPhrases = [
            'start1' => ['I bought', 'I tried', 'This is', 'I\'ve used'],
            'start2' => ['it seems', 'it feels', 'it appears', 'it\'s'],
            'advantage' => ['acceptable', 'average', 'ordinary', 'standard'],
            'feature' => ['the design', 'the quality', 'the performance', 'the functionality'],
            'end' => ['It\'s okay.', 'It\'s decent.', 'It serves its purpose.', 'It\'s neither good nor bad.'],
        ];
        
        $phrases = fake()->randomElement([$positivePhrases, $negativePhrases, $neutralPhrases]);
        
        $reviewStart1 = fake()->randomElement($phrases['start1']);
        $reviewStart2 = fake()->randomElement($phrases['start2']);
        $advantage = fake()->randomElement($phrases['advantage']);
        $feature = fake()->randomElement($phrases['feature']);
        $end = fake()->randomElement($phrases['end']);
        
        if ($phrases === $negativePhrases) {
            $reviewScore = fake()->numberBetween(1, 2);
        } elseif ($phrases === $positivePhrases) {
            $reviewScore = fake()->numberBetween(4, 5);
        } else {
            $reviewScore = 3;
        }
        
        // Construct the review description
        $description = "{$reviewStart1} {$product->title}, {$reviewStart2} {$advantage} for {$feature}. {$end}";

        return [
            'rating' => $reviewScore,
            'description' => $description,
            'attributes' => json_encode(["colour" => fake()->colorName(), "size" => $sizes[rand(0, count($sizes) -1)]]),
            'user_id' => fake()->numberBetween(1, User::count()),
            'product_id' => $product->id,
        ];
    }
}
