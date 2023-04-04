<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DishController;
use App\Http\Controllers\Api\TypeController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\RestaurantController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/restaurants', [RestaurantController::class, 'index']);
Route::get('/restaurants/{types}', [RestaurantController::class, 'filter']);
Route::get('/types', [TypeController::class, 'index']);
Route::get('/dishes/{id}', [DishController::class, 'index']);
Route::post('/cart', [OrderController::class, 'store']);