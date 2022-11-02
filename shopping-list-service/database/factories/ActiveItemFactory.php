<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\ShoppingList;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ActiveItem>
 */
class ActiveItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id'=> $this->faker->randomDigit(),
            'item_id' => Item::factory()->create()->id,
            'shopping_list_id' => ShoppingList::factory()->create()->id,
            'bought_at' => null,
            'added_at' => Carbon::now(),
            'amount' => $this->faker->randomDigit()
        ];
    }
}
