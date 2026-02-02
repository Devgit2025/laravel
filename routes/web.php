<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;




//Product
Route::get('/', [ProductController::class, 'index']);
Route::post('/insert', [ProductController::class, 'insert']);
Route::get('addproduct',[ProductController::class, 'addproduct'])->name('addproduct');
Route::get('allproduct', [ProductController::class, 'allproduct'])->name('allproduct');
Route::get('editproduct/{id}', [ProductController::class, 'editproduct'])->name('editproduct');
Route::get('delete/{id}', [ProductController::class, 'deleteproduct'])->name('deleteproduct');
Route::post('updateproduct/{id}', [ProductController::class, 'updateproduct'])->name('updateproduct');

//User
Route::get('userdata',[UserController::class, 'index'])->name('user.index');
Route::get('edituser', [UserController::class, 'edituser'])->name('edit.user');
Route::post('updateuser/{id}', [UserController::class, 'updateuser'])->name('update.user');

//cart
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');


//checkout
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/sendorder', [CheckoutController::class, 'sendorder'])->name('sendorder');
Route::get('/bill', [CheckoutController::class, 'bill'])->name('bill');
Route::get('/allbill', [CheckoutController::class, 'allbill'])->name('allbill');
Route::get('detailbill/{id}', [CheckoutController::class, 'detailbill'])->name('detailbill');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
