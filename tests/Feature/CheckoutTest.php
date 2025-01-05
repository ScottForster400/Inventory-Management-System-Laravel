<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Cart;
use App\Models\Product;

class CheckoutTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_see_products_in_cart(): void
    {
        $user = User::factory()->create([
            'id' => '1',
        ]);
        $product = Product::factory()->create([
            'product_id'=> '1',
            'name' => 'TestProduct',
        ]);
        $cart = Cart::factory()->create([
            'user_id' => $user->id,
            'product_id' => $product->product_id,
            'amount' => 1,
        ]);
        $response = $this->actingAs($user)->get('/checkout');

        $response->assertSee('TestProduct');
    }
    public function test_user_can_add_products_to_cart(): void
    {
        $user = User::factory()->create([
            'id' => '1',
        ]);

        $product = Product::factory()->create();

        $response = $this->actingAs($user)->post('/checkout/add', [
            'productIdToAddToCart' => $product->product_id,
        ]);

        $this->assertDatabaseHas('carts', [
            'cart_id' => 1,
            'user_id' => $user->id,
            'product_id' => $product->product_id,
            'amount' => 1,
        ]);

        $response->assertRedirectToRoute('dashboard.index');
    }
    public function test_user_can_checkout_products_in_cart() : void
    {
        $user = User::factory()->create([
            'id' => '1',
        ]);
        $product = Product::factory()->create([
            'product_id'=> '1',
            'name' => 'TestProduct',
        ]);
        $cart = Cart::factory()->create([
            'cart_id' => 1,
            'user_id' => $user->id,
            'product_id' => $product->product_id,
            'amount' => 1,
        ]);
        $response = $this->actingAs($user)->post('/checkout/destroy', [
            'User' => $user,
        ]);

        $this->assertDatabaseMissing('carts',[#
            'cart_id' => 1,
            'user_id' => $user->id,
            'product_id'=> $product->product_id,
            'amount'=> 1,
        ]);
    }
}
