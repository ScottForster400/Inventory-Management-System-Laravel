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
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/stock', function () {
    $user = DB::table('users')->get();
    return view('stock');
})->middleware(['auth', 'verified'])->name('stock');


Route::get('/manage-employees', function () {
    return view('manage-employees',[UserController::class, 'index']);
})->middleware(['auth', 'verified'])->name('manage-employees');

Route::get('/checkout', function () {
    return view('checkout', [CartController::class, 'index']);
})->middleware(['auth', 'verified'])->name('checkout');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Dashboard search and sort
Route::get('/dashboard/search', [DashboardController::class, 'search'])->name('dashboard.search')->middleware('auth');

Route::get('/dashboard/sort', [DashboardController::class, 'sort'])->name('dashboard.sort')->middleware('auth');

Route::get('/dashboard/search/sort', [DashboardController::class, 'sortSearch'])->name('dashboard.sortSearch')->middleware('auth');

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

Route::resource('dashboard',DashboardController::class)->middleware('auth');
Route::resource('checkout',CartController::class)->middleware('auth');



