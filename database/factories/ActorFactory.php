<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Actor>
 */
class ActorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->firstName(),
            'surname' => fake()->lastName(),
            'birthdate' => fake()->date('Y-m-d', '2005-12-31'),
            'country' => fake()->country(),
            'img_url' => fake()->imageUrl(400, 400, 'people', true),
        ];
    }
}
