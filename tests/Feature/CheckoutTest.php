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
            'user_id' => '1',
        ]);
        $product = Product::factory()->create([
            'product_id'=> '1',
            'name' => 'TestProduct',
        ]);
        $cart = Cart::factory()->create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'amount' => 1,
        ]);
        $response = $this->actingAs($user)->get('/checkout');

        $response->assertSee('TestProduct');
    }
}
