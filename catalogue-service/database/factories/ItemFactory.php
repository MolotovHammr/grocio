<?php

namespace Database\Factories;

use App\Models\Catalogue;
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
            'name' => $this->faker->name(),
            'quantity' => $this->faker->randomFloat(2, 0, 3000.00),
            'unit' => $this->faker->randomElement(['l', 'g']),
            'energy' => $this->faker->randomFloat(2, 0, 3000.00),
            'total_fat' => $this->faker->randomFloat(2, 0, 3000.00),
            'saturated_fat' => $this->faker->randomFloat(2, 0, 3000.00),
            'total_carbohydrates' => $this->faker->randomFloat(2, 0, 3000.00),
            'sugars' => $this->faker->randomFloat(2, 0, 3000.00),
            'protein' => $this->faker->randomFloat(2, 0, 3000.00),
            'salt' => $this->faker->randomFloat(2, 0, 3000.00),
            "price" => $this->faker->randomFloat(2, 0, 3000.00),
            'catalogue_id' => Catalogue::factory()->create()->id,
        ];
    }
}
