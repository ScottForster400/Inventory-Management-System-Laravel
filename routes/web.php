<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/generate-reports', function () {
    $transaction = DB::table('transactions')->get();
    return view('generate-reports', ['transaction' => $transaction]);
})->middleware(['auth', 'verified'])->name('generate-reports');


Route::get('/manage-employees', function () {
    $user = DB::table('users')->get();
    return view('manage-employees');
})->middleware(['auth', 'verified'])->name('manage-employees');

Route::get('/checkout', function () {
    return view('checkout', [CartController::class, 'index']);
})->middleware(['auth', 'verified'])->name('checkout');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

//all branches routes
Route::resource('branches', BranchController::class)->middleware('auth');

//all products routes
Route::resource('products', ProductController::class)->middleware('auth');

//all user routes
Route::resource('users',UserController::class)->middleware('auth');

//all stock routes
Route::resource('stocks',StockController::class)->middleware('auth');

//all transaction routes
Route::resource('transactions',TransactionController::class)->middleware('auth');

Route::resource('admin',AdminController::class)->middleware('auth');



