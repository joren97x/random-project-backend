<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\GroupchatController;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\ProductController;
use App\Http\Controllers\Api\V1\TodoController;
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

//public routes

// dire mo proceed ang katong login
// unya iyang gamiton nga controller kay AuthController unya e run niya ang login nga function
Route::post('/login', [AuthController::class, 'login']);

// dire mo proceed ang katong register
// unya iyang gamiton nga controller kay AuthController unya e run niya ang register nga function
Route::post('/register', [AuthController::class, 'register']);


Route::get('/getAuth', [AuthController::class, 'getAuth']);
Route::apiResource('products', ProductController::class);
Route::apiResource('group-chat', GroupchatController::class);

//protected routes
Route::group(['middleware' => 'auth:sanctum'], function() {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::apiResource('users', UserController::class);


    // ari dire mapunta ang tanan route related sa todo, 
    // like get all todos, create todo, delete todo, update todo
    // naa ni sha sulod sa middleware nga auth sanctum meaning dapat authenticated ang request
    // or naay token sa headers
    Route::apiResource('todo', TodoController::class);



});
