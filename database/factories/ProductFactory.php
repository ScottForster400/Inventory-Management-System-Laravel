<?php

namespace Database\Factories;

use Illuminate\Support\Str;
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
        $rndNum = fake()->numberBetween(100,999);
        return [
            'name'=>('Sample Product'.$rndNum),
            'uuid'=> Str::uuid(),
            'manufacturer'=> fake('en_GB')->company(),
            'description'=>fake('en_GB')->text(),
            'age_rating'=>fake()->numberBetween(0,10),
            'minimum_player_count'=>fake()->numberBetween(1,2),
            'maximum_player_count'=>fake()->numberBetween(2,10),
            'game_length'=>fake()->numberBetween(10,60),
            'Price'=>fake()->randomFloat(2,0.01,100),
            'game_type'=>'board_game',
            'game_genre'=>'puzzle',
            'image'=>'imgs/logo.png'

        ];
    }
}
