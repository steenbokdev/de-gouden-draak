<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dish>
 */
class DishFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'menu_number' => $this->faker->optional(weight: 0.95)->numberBetween(1, 100),
            'menu_addition' => $this->faker->optional(weight: 0.4)->word,
            'name' => $this->faker->word,
            'price' => $this->faker->optional(weight: 0.9)->randomFloat(2, 1, 100),
            'category' => $this->faker->optional(weight: 0.95)->word,
            'description' => $this->faker->optional(weight: 0.8)->sentence,
        ];
    }
}
