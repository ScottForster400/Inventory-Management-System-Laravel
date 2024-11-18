<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use App\Http\Controllers\Controller;
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
        dd($products);
        return view('checkout')->with('carts', $carts)->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
