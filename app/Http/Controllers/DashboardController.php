<?php

namespace App\Http\Controllers;

use PhpOption\None;
use App\Models\Stock;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Cast\Array_;
use PhpParser\Node\Expr\Cast\String_;
use Ramsey\Uuid\Type\Integer;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //dd($_REQUEST);
        // dd($int);
        $branchId = Auth::user()->branch_id;
        $stocks = Stock::where('branch_id',$branchId)->get();
        $productsIdVals = collect();
        foreach($stocks as $stock){
            $productsIdVals->push($stock->product_id);

        }
        $products = Product::whereIn('product_id',$productsIdVals)->paginate(6);

        $sortedStocks = collect();
        foreach($products as $product){
            $sortedStocks->push(Stock::where('product_id',$product->product_id)->first());
        }
        if(session('success')){
            session()->flash('success',session('success'));
            return view('dashboard')->with('stock', $stocks)->with('products',$products);
        }
        else{
            return view('dashboard')->with('stock', $sortedStocks)->with('products',$products);
        }


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        //make sure request contains all relevant info
        $request->validate([
            'name' => 'required|Max:50',
            'price' => 'required',
            'manufacturer' => 'required',
            'age_rating' => 'required',
            'amount' => 'required',
            'game_length' => 'required',
            'min_players' => 'required',
            'max_players' => 'required',
            'game_type' => 'required',
            'game_genre' => 'required'
        ]);

        $alreadyExist = Product::where('name',$request->name)->first();

        //Checks if product exists in branch -- if true updates stock amount with inputted amount
        if($alreadyExist != null){
            $inBranch = Stock::where('branch_id',Auth::user()->branch_id)->where('product_id',$alreadyExist->product_id)->first();
            if($inBranch !=null){
                $updatedAmount = $request->amount + $inBranch->amount;
                $inBranch->update([
                    'amount'=>$updatedAmount,

                ]);
                session()->flash('success',"{$request->name} already exists updated stock count with specified amount ");
                    // Returns user to main dashboard view
                    return to_route('dashboard.index');
            }
        }

        // Creates a new Product model with inputted data and saves it to database
        $uuid = Str::uuid();
        $product = new Product([
            'name' =>  $request->name,
            'uuid' => $uuid,
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

        $productIds = Product::where('uuid',$uuid)->get();

        foreach($productIds as $productId){
            $selectedProductId = $productId->product_id;
        }

        $stock = new Stock([
            'amount' => $request->amount,
            'branch_id' => Auth::user()->branch_id,
            'product_id' => $selectedProductId
        ]);

        $stock->save();
        session()->flash('success',"{$request->name} has been successfully added ");
        // Returns user to main dashboard view
        return to_route('dashboard.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Stock $stock)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stock $stock)
    {
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $product)
    {


        if ($request->file('img')){

                    $selectedProductArray = Product::where('product_id',$product)->get();
                    foreach($selectedProductArray as $p){
                        $selectedProduct =$p;
                    }

                    // Validate the image
                    $request->validate([
                        'img' => 'required',
                    ]);


                    // Create the uploads directory if it doesn't exist
                    $uploadPath = public_path('uploads');
                    if (!file_exists($uploadPath)) {
                        mkdir($uploadPath, 0755, true);
                    }


                    // if ($request->file('img')) {

                        //Renames image so that there wont be duplicates in the db
                        $imageName = time() . '.' . $request->img->extension();
                        $request->img->move($uploadPath, $imageName);

                        $selectedProduct->update([
                            'image'=>'uploads/'.$imageName,
                        ]);

                        session()->flash('success',"{$selectedProduct->name}'s image has been successfully uploaded");
                        //Returns user to main dashboard view
                         return to_route('dashboard.index',['success'=>"{$selectedProduct->name} successfully removed"]);
                    // }
                    // return redirect()->route('dashboard.index')->with('error', 'Image upload failed.');
                }

        $request->validate([
            'name' => 'required|Max:50',
            'price' => 'required',
            'manufacturer' => 'required',
            'age_rating' => 'required',
            'amount' => 'required',
            'game_length' => 'required',
            'min_players' => 'required',
            'max_players' => 'required',
            'game_type' => 'required',
            'game_genre' => 'required'
        ]);



        $selectedProductArray = Product::where('product_id',$product)->get();
        foreach($selectedProductArray as $p){
            $selectedProduct =$p;
        }
        // if($request->description)

        $selectedProduct->update([
            'name' =>  $request->name,
            'Price' => $request->price,
            'manufacturer' => $request->manufacturer,
            'age_rating' => $request->age_rating,
            'game_length' => $request->game_length,
            'minimum_player_count' => $request->min_players,
            'maximum_player_count' => $request->max_players,
            'description' => $request->description,
            'game_type' => $request->game_type,
            'game_genre' => $request->game_genre
        ]);

        $alreadyExist = Product::where('name',$request->name)->whereNot('product_id',$selectedProduct->product_id)->first();

        //Checks if product exists in branch -- if true updates stock amount with inputted amount
        if($alreadyExist != null){
            $inBranch = Stock::where('branch_id',Auth::user()->branch_id)->where('product_id',$alreadyExist->product_id)->first();
            if($inBranch !=null){
                $updatedAmount = $request->amount + $inBranch->amount;
                $inBranch->update([
                    'amount'=>$updatedAmount,

                ]);
                $selectedProduct->delete();
                session()->flash('success',"{$request->name} already exists updated stock count with specified amount ");
                    // Returns user to main dashboard view
                    return to_route('dashboard.index');
            }
        }

        $stockArray=Stock::where('product_id', $selectedProduct->product_id)->where('branch_id',Auth::user()->branch_id)->get();
        foreach($stockArray as $stock){
            $selectedStock =$stock;
        }
        $selectedStock->update([
            'amount' => $request->amount,
        ]);

        session()->flash('success',"{$selectedProduct->name}' has been successfully edited");

         //Returns user to main dashboard view
         return to_route('dashboard.index');
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

        return to_route('dashboard.index',['success'=>"{$selectedProduct->name} successfully removed"]);
    }

    //Searches stock used https://medium.com/@iqbal.ramadhani55/search-in-laravel-e0e20f329b01 to help create function
    public function search(Request $request){

        $branchId = Auth::user()->branch_id;
        $stocks = Stock::where('branch_id',$branchId)->get();

        $productsIdVals = collect();
        foreach($stocks as $stock){
        $productsIdVals->push($stock->product_id);

        }


        // if(array_key_exists('search',$_REQUEST)){


            $searchRequest = $request->search;
            $products = Product::where([
                ['name','like',"%$searchRequest%"],
                ['price','>=',$request->min_price],
                ['price','<=',$request->max_price],
                ['age_rating','<=',$request->age],
                ['maximum_player_count','<=',$request->player_count],
                ['game_length','<=', $request->game_length],
                ['game_type','like',"%$request->game_type%"],
                ['game_genre','like',"%$request->game_genre%"]

                ])->whereIn('product_id', $productsIdVals)->paginate(6)->withQueryString();

        // }
        // else{
        //     $products=Product::whereIn('product_id', $productsIdVals)->paginate(4);
        // }



        return view('dashboard')->with('products',$products)->with('stock',$stocks);
    }
    public function sort(){



        $branchId = Auth::user()->branch_id;
        $stocks = Stock::where('branch_id',$branchId)->get();
        $productsIdVals = collect();
        foreach($stocks as $stock){
            $productsIdVals->push($stock->product_id);

        }

        if(array_key_exists('sort_by',$_REQUEST)){
            $sortBy = $_REQUEST['sort_by'];
            if($sortBy =='alph_asc'){
                $products = Product::whereIn('product_id',$productsIdVals)->orderBy('name','asc')->paginate(6)->withQueryString();
            }
            elseif($sortBy =='alph_des'){
                $products = Product::whereIn('product_id',$productsIdVals)->orderBy('name','desc')->paginate(6)->withQueryString();
            }
            elseif($sortBy == 'price_asc'){
                $products = Product::whereIn('product_id',$productsIdVals)->orderBy('Price','asc')->paginate(6)->withQueryString();
            }
            elseif($sortBy == 'price_des'){
                $products = Product::whereIn('product_id',$productsIdVals)->orderBy('Price','desc')->paginate(6)->withQueryString();
            }

           //fetches the stock info in the requested order which allows the amount of product to be displayed correctly
           $sortedStocks = collect();
           foreach($products as $product){
               $sortedStocks->push(Stock::where('product_id',$product->product_id)->first());
           }
        }
        return view('dashboard')->with('stock', $sortedStocks)->with('products',$products);
    }

    public function sortSearch(){

        // dd($_REQUEST);
        $branchId = Auth::user()->branch_id;
        $stocks = Stock::where('branch_id',$branchId)->get();

        $productsIdVals = collect();
        foreach($stocks as $stock){
        $productsIdVals->push($stock->product_id);
        }

        $searchRequest = $_REQUEST['search'];

        if(array_key_exists('sort_by',$_REQUEST) && array_key_exists('search',$searchRequest)){
            $sortBy = $_REQUEST['sort_by'];

            if($sortBy =='alph_asc'){
                $products = Product::where([
                    ['name','like',"%$searchRequest[search]%"],
                    ['price','>=',$searchRequest['min_price']],
                    ['price','<=',$searchRequest['max_price']],
                    ['age_rating','<=',$searchRequest['age']],
                    ['maximum_player_count','<=',$searchRequest['player_count']],
                    ['game_type','like',"%$searchRequest[game_type]%"],
                    ['game_genre','like',"%$searchRequest[game_genre]%"]

                    ])->whereIn('product_id', $productsIdVals)->orderBy('name', 'asc')->paginate(6)->withQueryString();


            }
            elseif($sortBy =='alph_des'){
                $products = Product::where([
                    ['name','like',"%$searchRequest[search]%"],
                    ['price','>=',$searchRequest['min_price']],
                    ['price','<=',$searchRequest['max_price']],
                    ['age_rating','<=',$searchRequest['age']],
                    ['maximum_player_count','<=',$searchRequest['player_count']],
                    ['game_type','like',"%$searchRequest[game_type]%"],
                    ['game_genre','like',"%$searchRequest[game_genre]%"]

                    ])->whereIn('product_id', $productsIdVals)->orderBy('name', 'desc')->paginate(6)->withQueryString();
            }
            elseif($sortBy == 'price_asc'){
                $products = Product::where([
                    ['name','like',"%$searchRequest[search]%"],
                    ['price','>=',$searchRequest['min_price']],
                    ['price','<=',$searchRequest['max_price']],
                    ['age_rating','<=',$searchRequest['age']],
                    ['maximum_player_count','<=',$searchRequest['player_count']],
                    ['game_type','like',"%$searchRequest[game_type]%"],
                    ['game_genre','like',"%$searchRequest[game_genre]%"]

                    ])->whereIn('product_id', $productsIdVals)->orderBy('Price', 'asc')->paginate(6)->withQueryString();
            }
            elseif($sortBy == 'price_des'){
                $products = Product::where([
                    ['name','like',"%$searchRequest[search]%"],
                    ['price','>=',$searchRequest['min_price']],
                    ['price','<=',$searchRequest['max_price']],
                    ['age_rating','<=',$searchRequest['age']],
                    ['maximum_player_count','<=',$searchRequest['player_count']],
                    ['game_type','like',"%$searchRequest[game_type]%"],
                    ['game_genre','like',"%$searchRequest[game_genre]%"]

                    ])->whereIn('product_id', $productsIdVals)->orderBy('Price', 'desc')->paginate(6)->withQueryString();
            }
            //fetches the stock info in the requested order which allows the amount of product to be displayed correctly
            $sortedStocks = collect();
            foreach($products as $product){
                $sortedStocks->push(Stock::where('product_id',$product->product_id)->first());
            }
        }
        return view('dashboard')->with('stock', $sortedStocks)->with('products',$products);

    }

}
