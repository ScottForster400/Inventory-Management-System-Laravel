<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Dashboard;
use App\Models\Cart;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Stock;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        // gets user id
        $carts = Cart::where('user_id', $user_id)->get();
        // gets carts associated to the user
        $productIDs = Cart::select('product_id')->where('user_id', $user_id)->get();
        // $productIDs is the product id column where the user id is equal to current user
        $productIDvals = collect();
        // makes a collection

        foreach($productIDs as $productID){
            $productIDvals->push($productID);
        }

        $products = Product::whereIn('product_id',$productIDvals)->get();
        // gets the products from the database where product id is equal to the products in the cart
        if($carts){
            $amount = 0;
            foreach($products as $product){
                $productAmounts = Cart::select('amount')->where('product_id', $product->product_id)->where('user_id', $user_id)->get();
                if(array_key_exists('quantity' , $_REQUEST)){
                    if($product->product_id == $_REQUEST['quantity']){

                    }
                }
                foreach($productAmounts as $productAmount) {
                    $productPrice = floatval($productAmount->amount) * $product->Price;
                    $amount = $amount + $productPrice;                }
            }
            $orderedCarts = $carts->sortBy('product_id');
            return view('checkout')->with('carts', $orderedCarts)->with('products', $products)->with('amount', $amount)->with('user', $user_id);
        }
        return view('checkout');
    }
    // needs work

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        dd("create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd("store");
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        dd("show");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $carts)
    {
        dd("edit");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        dd("update");
    }

        /**
    * Remove the specified resource from storage.
    */
    public function destroy(User $user)
    {
        $user_id = Auth::user()->id;
        $carts = Cart::where('user_id', $user_id)->get();
        $productIDs = Cart::select('product_id')->where('user_id', $user_id)->get();
        $productIDvals = collect();
        foreach($productIDs as $productID){
            $productIDvals->push($productID);
        }
        $products = Product::whereIn('product_id',$productIDvals)->get();
        $amount = 0;
        foreach($products as $product){
            $stockProductID = $product->product_id;
            $productAmounts = Cart::select('amount')->where('product_id', $stockProductID)->where('user_id', $user_id)->get();
            $stocks = Stock::where('product_id', $stockProductID)->get();

            foreach($stocks as $stock) {
                $stockUpdate = $stock->amount;
                foreach($productAmounts as $productAmount) {
                    $toUpdate = $productAmount->amount;
                    $updatedStock = $stockUpdate - $toUpdate;
                    $stock->amount = $updatedStock;
                    $stock->update([
                        'amount'=> $updatedStock,
                    ]);
                }
            }
            foreach($productAmounts as $productAmount) {
                $productPrice = floatval($productAmount->amount) * $product->Price;
                $amount = $amount + $productPrice;
                $transaction = new Transaction ([
                    'price' => $amount,
                    'user_id' => $user_id,
                    'product_id' => $stockProductID,
                    'amount' => $productAmount->amount,
                ]);
                $transaction->save();
                $amount = 0;
            }

        }
        DB::table('carts')->where('user_id', $user_id)->delete();

        return to_route('dashboard.index');
    }


}
