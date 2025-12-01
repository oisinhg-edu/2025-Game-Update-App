<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // random title between 2 and 5 words, string
            'title' => fake()->words(rand(2,5), true),
            
            'description' => fake()->paragraph(),
            
            'release_date' => fake()->date(),
            
            // pick one platform
            'platform' => fake()->randomElement(['PC', 'PS', 'Xbox', 'Nintendo']),

            // pick one image
            'cover_img' => fake()->randomElement([
                'placeholder/placeholder1.png',
                'placeholder/placeholder2.png',
                'placeholder/placeholder3.png',
                'placeholder/placeholder4.png',
                'placeholder/placeholder5.png',
                'placeholder/placeholder6.png',
                'placeholder/placeholder7.png',
                'placeholder/placeholder8.png',
                'placeholder/placeholder9.png',
                'placeholder/placeholder10.png',
            ]),
        ];
    }
}
