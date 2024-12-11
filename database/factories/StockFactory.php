<?php

namespace Database\Factories;

use App\Models\Stock;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stock>
 */
class StockFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'amount'=>fake()->numberBetween(1,1000),
            'branch_id'=>fake()->numberBetween(1,5),

            //Unique so a branch doesn't have 2 entries for the same stock
            'product_id'=>fake()->unique()->numberBetween(1,15)
        ];
    }
}
