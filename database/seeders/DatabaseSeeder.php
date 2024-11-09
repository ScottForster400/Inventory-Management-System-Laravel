<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Stock;
use App\Models\Branch;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Branch::factory()->Count(5)->create();
        User::factory()->Count(5)->create();
        Product::factory()->Count(15)->create();
        Transaction::factory()->Count(5)->create();
        Stock::factory()->count(10)->create();
    }
}
