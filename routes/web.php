<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'index'])->name('product.index');
Route::get('products/create', [ProductController::class, 'create'])->name('product.create');
Route::post('products/store', [ProductController::class, 'store'])->name('product.store');

//product/create this is used in url as routing
Route::get('products/{id}/edit',[ProductController::class,'edit']);
Route::get('products/{id}/update', [ProductController::class,'update']);
Route::get('products/{id}/delete', [ProductController::class,'destroy']);

Route::delete('products/selected-products', [ProductController::class,'deleteChecked'])->name('product.deleteChecked');