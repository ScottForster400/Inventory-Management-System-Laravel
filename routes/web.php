<?php

use App\Models\User;
use App\Models\Stock;
use App\Models\Branch;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin.generate-reports', function () {
    return view('admin.generate-reports');
})->middleware(['auth', 'verified'])->name('admin.generate-reports');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

//all branches routes
Route::resource('branches', Branch::class)->middleware('auth');

//all products routes
Route::resource('products', Product::class)->middleware('auth');

//all user routes
Route::resource('users',User::class)->middleware('auth');

//all stock routes
Route::resource('stock',Stock::class)->middleware('auth');

//all transaction routes
Route::resource('stock',Transaction::class)->middleware('auth');



