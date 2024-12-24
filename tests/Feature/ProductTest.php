<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Stock;
use App\Models\Branch;
use App\Models\Product;
use Illuminate\Routing\Route;
use Database\Seeders\StockSeeder;

use Database\Seeders\ProductSeeder;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
   use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_correct_branch_products_are_displayed_for_user(): void
    {

        $branch = Branch::factory()->create([
            'branch_id' => 1
        ]);

       $user = User::factory()->create([
            'branch_id' => 1
       ]);

       $productInBranch = Product::factory()->create([
            'name' => 'productInBranch'

       ]);

       $productNotInBranch = Product::factory()->create([
            'name' => 'productNotInBranch'
       ]);

       $productInBranchStock = Stock::factory()->create([
            'product_id' => $productInBranch -> product_id,
            'branch_id' => 1
       ]);

       $response = $this->actingAs($user)->get('dashboard')->assertStatus(200);
       $response->assertSeeText('productInBranch');
       $response->assertDontSeeText('productNotInBranch');

    }

    public function test_new_product_can_be_added_to_database(): void
    {
        $branch = Branch::factory()->create([
            'branch_id' => 1
        ]);

       $user = User::factory()->create([
            'branch_id' => 1
       ]);

       $productInBranch = Product::factory()->create([
            'name' => 'productInBranch'

       ]);

       $productNotInBranch = Product::factory()->create([
            'name' => 'productNotInBranch'
       ]);

       $productInBranchStock = Stock::factory()->create([
            'product_id' => $productInBranch -> product_id,
            'branch_id' => 1
       ]);



       $response = $this->actingAs($user)->post('dashboard',[
            'name' => 'testAdd',
            'manufacturer' => 'test',
            'description' => 'This is a test addition',
            'age_rating' => 12,
            'min_players' => 2,
            'max_players' => 4,
            'game_length' => 60,
            'price' => 12,
            'game_type' => 'board_game',
            'game_genre' => 'puzzle',
            'amount' => '500'
       ]);

       $this->assertDatabaseHas('products',[
            'name' => 'testAdd',
            'manufacturer' => 'test',
            'description' => 'This is a test addition',
            'age_rating' => 12,
            'minimum_player_count' => 2,
            'maximum_player_count' => 4,
            'game_length' => 60,
            'Price' => 12,
            'game_type' => 'board_game',
            'game_genre' => 'puzzle'
       ]);

       $response->assertRedirectToRoute('dashboard.index');

    }

    public function test_user_can_remove_stock(){

        $branch = Branch::factory()->create([
            'branch_id' => 1
        ]);

       $user = User::factory()->create([
            'branch_id' => 1
       ]);

       $productInBranch = Product::factory()->create([
            'name' => 'productInBranch'

       ]);

       $productInBranchStock = Stock::factory()->create([
        'product_id' => $productInBranch -> product_id,
        'branch_id' => 1
        ]);

        $response = $this->actingAs($user)->delete('/dashboard/'.$productInBranch->id);

        $this->assertDatabaseMissing('Stocks',[
            'product_id' => $productInBranchStock->id,
        ]);


    }
}
