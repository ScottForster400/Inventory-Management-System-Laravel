<?php

use App\Models\User;
use App\Models\Stock;
use App\Models\Branch;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Models\Transaction;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

//all branches routes
Route::resource('branches', Branch::class);

//all products routes
Route::resource('products', Product::class);

//all user routes
Route::resource('users',User::class);

//all stock routes
Route::resource('stock',Stock::class);

//all transaction routes
Route::resource('stock',Transaction::class);



