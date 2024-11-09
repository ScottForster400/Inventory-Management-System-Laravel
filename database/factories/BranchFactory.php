<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Branch>
 */
class BranchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'branch_name' => fake('en_GB')->unique()->company(),
            'branch_location' => fake('en_GB')->city(),
            'created_at' => fake('en_GB')->dateTime()
        ];
    }
}
