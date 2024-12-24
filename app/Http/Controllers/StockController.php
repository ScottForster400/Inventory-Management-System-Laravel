<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $branchId = Auth::user()->branch_id;

    // Retrieve stocks for the current branch
    $stocks = Stock::where('branch_id', $branchId)->get();

    // Collect product IDs from the stocks
    $productsIdVals = collect();
    foreach ($stocks as $stock) {
        $productsIdVals->push($stock->product_id);
    }

    // Fetch products with pagination
    $products = Product::whereIn('product_id', $productsIdVals)->paginate(4);

    // Pass both $stocks and $products to the view
    return view('dashboard')->with('stocks', $stocks)->with('products', $products);
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
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stock $stock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stock $stock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stock $stock)
    {
        //
    }
}
