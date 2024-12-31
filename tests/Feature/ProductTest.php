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
use Illuminate\Container\Attributes\Database;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\Mime\Part\DataPart;

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

    public function test_user_can_edit_stock(){

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
            'branch_id' => 1,
            'amount' => 500
       ]);



       $response = $this->actingAs($user)->put('/dashboard/'.$productInBranch -> product_id,[
            'name' => 'update_test',
            'price' => 500,
            'description' => $productInBranch -> description,
            'manufacturer' => $productInBranch -> manufacturer,
            'age_rating' => $productInBranch -> age_rating,
            'game_length' => $productInBranch -> game_length,
            'min_players' => $productInBranch -> minimum_player_count,
            'max_players' => $productInBranch -> maximum_player_count,
            'game_type' => $productInBranch -> game_type,
            'game_genre' => $productInBranch -> game_genre,
            'amount' => 250
       ]);

       $this->assertDatabaseHas('products',[
        'product_id' => $productInBranch -> product_id,
        'name' => 'update_test',
        'price' => 500,
        'description' => $productInBranch -> description,
        'manufacturer' => $productInBranch -> manufacturer,
        'age_rating' => $productInBranch -> age_rating,
        'game_length' => $productInBranch -> game_length,
        'minimum_player_count' => $productInBranch -> minimum_player_count,
        'maximum_player_count' => $productInBranch -> maximum_player_count,
        'game_type' => $productInBranch -> game_type,
        'game_genre' => $productInBranch -> game_genre,
        ]);

        $this->assertDatabaseHas('stocks',[
            'stock_id' => $productInBranchStock -> stock_id,
            'product_id' => $productInBranch -> product_id,
            'branch_id' => $user -> branch_id,
            'amount' => '250'
        ]);

        $response->assertRedirectToRoute('dashboard.index');

    }
}
