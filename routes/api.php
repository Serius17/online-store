<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/products', [ProductController::class, 'index']);
Route::post('/products', [ProductController::class, 'store']);
Route::patch('/products/{id}', [ProductController::class, 'update']);
Route::delete('/products/{id}', [ProductController::class, 'delete']);

Route::get('/pengguna', [ProductController::class, 'index']);
Route::post('/pengguna', [ProductController::class, 'store']);
Route::patch('/pengguna/{id}', [ProductController::class, 'update']);
Route::delete('/pengguna/{id}', [ProductController::class, 'delete']);

Route::get('/order', [ProductController::class, 'index']);
Route::post('/order', [ProductController::class, 'store']);
Route::patch('/order/{id}', [ProductController::class, 'update']);
Route::delete('/order/{id}', [ProductController::class, 'delete']);
