<?php

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\ProductController;
use App\Http\Controllers\Api\V1\UserController;
use App\Models\User;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/products', function() {
//     return Product::all();
// });

Route::get('/products/special-route/{product}', function(Product $product) {
    return $product;
});

// Route::post('/products', function(Request $request) {
//     return $request->name;
// });

Route::apiResource('products', ProductController::class);
Route::apiResource('users', UserController::class);