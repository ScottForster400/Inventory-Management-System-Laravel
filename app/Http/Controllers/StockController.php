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
        $stocks = Stock::where('branch_id',$branchId)->get();
        $productsIdVals = collect();
        foreach($stocks as $stock){
            $productsIdVals->push($stock->product_id);

        }
        $products = Product::whereIn('product_id',$productsIdVals)->paginate(4);
        if(session('success')){
            session()->flash('success',session('success'));
            return view('stock')->with('stock', $stocks)->with('products',$products);
        }
        else{
            return view('stock')->with('stock', $stocks)->with('products',$products);
        }


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        dd('create');
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
        dd('edit');
    }

    public function sort()
    {

        $branchId = Auth::user()->branch_id;
        $stocks = Stock::where('branch_id',$branchId)->get();
        $productsIdVals = collect();
        foreach($stocks as $stock){
            $productsIdVals->push($stock->product_id);

        }

        if(array_key_exists('sort_by',$_REQUEST)){
            $sortBy = $_REQUEST['sort_by'];
            if($sortBy =='alph_asc'){
                $products = Product::whereIn('product_id',$productsIdVals)->orderBy('name','asc')->paginate(4)->withQueryString();
            }
            elseif($sortBy =='alph_des'){
                $products = Product::whereIn('product_id',$productsIdVals)->orderBy('name','desc')->paginate(4)->withQueryString();
            }
            elseif($sortBy == 'price_asc'){
                $products = Product::whereIn('product_id',$productsIdVals)->orderBy('Price','asc')->paginate(4)->withQueryString();
            }
            elseif($sortBy == 'price_des'){
                $products = Product::whereIn('product_id',$productsIdVals)->orderBy('Price','desc')->paginate(4)->withQueryString();
            }

           //fetches the stock info in the requested order which allows the amount of product to be displayed correctly
           $sortedStocks = collect();
           foreach($products as $product){
               $sortedStocks->push(Stock::where('product_id',$product->product_id)->first());
           }
        }
        return view('dashboard')->with('stock', $sortedStocks)->with('products',$products);
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
    public function destroy(int $product)
    {
        $selectedProductArray = Product::where('product_id',$product)->get();
        foreach($selectedProductArray as $p){
            $selectedProduct = $p;
        }

        $stockArray=Stock::where('product_id', $selectedProduct->product_id)->where('branch_id',Auth::user()->branch_id)->get();
        foreach($stockArray as $stock){
            $selectedStock =$stock;
        }
        $selectedStock->delete();
       // $selectedProduct->delete();

        session()->flash('success',"{$selectedProduct->name} successfully removed");

        return to_route('stock.index',['success'=>"{$selectedProduct->name} successfully removed"]);
    }
    
}


