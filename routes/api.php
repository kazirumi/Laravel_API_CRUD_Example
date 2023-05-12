<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Resources\ProductResource;
use \App\Models\Product;
use \App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('/products',[ProductController::class,'index']);

Route::get('/product/{id}',[ProductController::class,'GetProductByID']);

Route::post('/product',[ProductController::class,'Store']);
Route::put('/product/{id}',[ProductController::class,'UpdateProduct']);
Route::delete('/product/{id}',[ProductController::class,'DeleteProduct']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
