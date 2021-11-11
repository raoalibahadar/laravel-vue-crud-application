<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/product/create', [\App\Http\Controllers\ProductController::class, 'store']);
Route::get('/product/edit/{id}', [\App\Http\Controllers\ProductController::class, 'show']);
Route::post('/product/update/{id}', [\App\Http\Controllers\ProductController::class, 'update']);
Route::delete('/product/delete/{id}', [\App\Http\Controllers\ProductController::class, 'destroy']);
Route::get('/products', [\App\Http\Controllers\ProductController::class, 'index']);
Route::get('/exportProduct', [\App\Http\Controllers\ProductController::class, 'exportProduct']);
