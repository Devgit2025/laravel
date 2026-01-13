<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;




Route::get('/', [ProductController::class, 'index']);
Route::post('/insert', [ProductController::class, 'insert']);
Route::get('addproduct',[ProductController::class, 'addproduct'])->name('addproduct');
Route::get('allproduct', [ProductController::class, 'allproduct'])->name('allproduct');
Route::get('editproduct/{id}', [ProductController::class, 'editproduct'])->name('editproduct');
Route::get('delete/{id}', [ProductController::class, 'deleteproduct'])->name('deleteproduct');
Route::post('updateproduct/{id}', [ProductController::class, 'updateproduct'])->name('updateproduct');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
