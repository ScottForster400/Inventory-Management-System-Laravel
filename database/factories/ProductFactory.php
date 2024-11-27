<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>'Sample Product',
            'manufacturer'=> fake('en_GB')->company(),
            'description'=>fake('en_GB')->text(),
            'age_rating'=>fake()->numberBetween(0,10),
            'minimum_player_count'=>fake()->numberBetween(1,2),
            'maximum_player_count'=>fake()->numberBetween(2,10),
            'game_length'=>fake()->numberBetween(10,60),
            'Price'=>fake()->randomFloat(2,0.01,100),
            'game_type'=>'Board Game',
            'game_genre'=>'Puzzle',
            'image'=>'imgs/logo.png'

        ];
    }
}
