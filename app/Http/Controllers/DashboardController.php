<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branchId = Auth::user()->branch_id;
        $stocks = Stock::where('branch_id',$branchId)->get();
        $productsIdVals = collect();
        foreach($stocks as $stock){
            $productsIdVals->push($stock->product_id);

        }
        $products = Product::whereIn('product_id',$productsIdVals)->paginate(6);
        return view('dashboard')->with('stock', $stocks)->with('products',$products);

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

        $request->validate([
            'name' => 'required|Max:50',
            'price' => 'required',
            'manufacturer' => 'required',
            'age_rating' => 'required',
            'amount' => 'required',
            'game_length' => 'required',
            'min_players' => 'required',
            'max_players' => 'required',

        ]);

        $product = new Product([
            'name' =>  $request->name,
            'price' => $request->price,
            'manufacturer' => $request->manufacturer,
            'age_rating' => $request->age_rating,
            'game_length' => $request->game_length,
            'minimum_player_count' => $request->min_players,
            'maximum_player_count' => $request->max_players,
            'description' => $request->description,
            'game_type' => $request->game_type,
            'game_genre' => $request->game_genre
        ]);
        $product->save();

        return to_route('dashboard.index');

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
