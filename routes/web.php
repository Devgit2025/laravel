<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;



Route::get('/', [ProductController::class, 'index']);
Route::post('/insert', [ProductController::class, 'insert']);
Route::get('addproduct',[ProductController::class, 'addproduct'])->name('addproduct');
Route::get('allproduct', [ProductController::class, 'allproduct'])->name('allproduct');
Route::get('editproduct/{id}', [ProductController::class, 'editproduct'])->name('editproduct');
Route::get('delete/{id}', [ProductController::class, 'deleteproduct'])->name('deleteproduct');
Route::post('updateproduct/{id}', [ProductController::class, 'updateproduct'])->name('updateproduct');

Route::get('userdata',[UserController::class, 'index'])->name('user.index');
Route::get('edituser/{id}', [UserController::class, 'edituser'])->name('edit.user');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
