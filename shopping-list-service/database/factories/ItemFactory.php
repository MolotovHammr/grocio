<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->colorName(),
            'quantity' => $this->faker->randomFloat(2, 0, 3000.00),
            'unit' => $this->faker->randomElement(['l', 'g']),
            'price' => $this->faker->randomFloat(2, 0, 3000.00),
            'catalogue_item_id' => $this->faker->numberBetween(1, 100),
        ];
    }
}
