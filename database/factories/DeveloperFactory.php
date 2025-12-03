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

             // pick one image
            'logo_img' => fake()->randomElement([
                'placeholder/devLogo1.png',
                'placeholder/devLogo2.png',
                'placeholder/devLogo3.png',
                'placeholder/devLogo4.png',
                'placeholder/devLogo5.png',
                'placeholder/devLogo6.png',
                'placeholder/devLogo7.png',
                'placeholder/devLogo8.png',
                'placeholder/devLogo9.png',
                'placeholder/devLogo10.png',
            ]),
        ];
    }
}
