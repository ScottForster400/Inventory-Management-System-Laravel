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
use App\Http\Controllers\Auth\RegisteredUserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/stock', function () {
    $user = DB::table('users')->get();
    return view('stock');
})->middleware(['auth', 'verified'])->name('stock');


Route::get('/manage-employees', [UserController::class, 'index'])->middleware(['auth', 'verified'])->name('manage-employees');

Route::get('/checkout', function () {
    return view('checkout', [CartController::class, 'index']);
})->middleware(['auth', 'verified'])->name('checkout');

Route::post('/checkout/add', [CartController::class, 'add'])->name('checkout.add')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/profile/{user?}', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/{user?}', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/{user?}', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::put('/profile/{user}/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');

});


Route::middleware('auth')
    ->get('/admin/create-employee', [RegisteredUserController::class, 'create'])
    ->name('create.employee');


Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/search', [UserController::class, 'search'])->name('user.search')->middleware('auth');

//Dashboard search and sort
Route::get('/dashboard/search', [DashboardController::class, 'search'])->name('dashboard.search')->middleware('auth');

Route::get('/dashboard/sort', [DashboardController::class, 'sort'])->name('dashboard.sort')->middleware('auth');

Route::get('/dashboard/search/sort', [DashboardController::class, 'sortSearch'])->name('dashboard.sortSearch')->middleware('auth');

// Route::get('/dashboard/img', [DashboardController::class, 'uploadImage'])->name('dashboard.img')->middleware('auth');

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



