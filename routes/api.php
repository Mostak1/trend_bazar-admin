<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
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
Route::get('/catapi', [CategoryController::class, 'catapi']);
Route::get('/productsapi', [ProductController::class, 'indexapi']);
Route::get('/productsapi/{id}', [ProductController::class, 'showapi']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/userstore', [HomeController::class, 'ustore']);




Route::post('/login', 'AuthController@login');
Route::post('/logout', 'AuthController@logout');

