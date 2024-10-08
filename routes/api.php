<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::group(['prefix' => 'auth'], function ($router) {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
 

});

Route::middleware(['auth' => 'api'], function ($router) {
    Route::post('logout', [AuthController::class,'logout']);
    Route::post('refresh', [AuthController::class,'refresh']);
    Route::post('me', [AuthController::class,'me']);
});

Route::prefix('product')->group(function () { 

    Route::get('get_products', [ProductController::class,'getProducts']);
    Route::get('show_products/{id}', [ProductController::class,'showProducts']);
    Route::get('search_products', [ProductController::class,'searchProducts']);
});
