<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Dashboard;
use App\Models\Cart;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
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
            $productAmounts = Cart::select('amount')->where('product_id', $product->product_id)->where('user_id', $user_id)->get();
        }
        foreach($productAmounts as $productAmount) {
            $productPrice = floatval($productAmount->amount) * $product->Price;
            $amount = $amount + $productPrice;
        }
        return view('checkout')->with('carts', $carts)->with('products', $products)->with('amount', $amount)->with('user', $user_id);
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
                }
                $updatedStock = $stockUpdate - $toUpdate;
                $stock->amount = $updatedStock;
                $stock->update([
                    'amount'=> $updatedStock,
                ]);
            }
            foreach($productAmounts as $productAmount) {
                $productPrice = floatval($productAmount->amount) * $product->Price;
                $amount = $amount + $productPrice;

            }
        }
        return to_route('dashboard.index');
    }

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


}
