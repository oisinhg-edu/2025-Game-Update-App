<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Developer>
 */
class DeveloperFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_name' => $this->faker->unique()->company(),
            'founded'      => $this->faker->year(),                 // e.g. "1998"
            'country'      => $this->faker->country(),              // e.g. "Japan"
            'logo_img'     => 'images/placeholder/placeholder1.png',  // or null if optional
        ];
    }
}
