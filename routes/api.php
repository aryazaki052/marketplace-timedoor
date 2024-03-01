<?php

use App\Http\Controllers\ProductsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// tampilkan semua data
Route::get('/product', [ProductsController::class, 'index']);

// show semua data berdasarkan id
Route::get('/product/{id}', [ProductsController::class, 'show']);

// update data berdasarkan id
Route::patch('/update/{id}', [ProductsController::class, 'update']);

// delete data berdasarkan id
Route::delete('/product/{id}', [ProductsController::class, 'destroy']);

// create product
Route::post('/create', [ProductsController::class, 'store']);

// restore product
Route::put('/product/trash/{id}', [ProductsController::class, 'restore']);

 