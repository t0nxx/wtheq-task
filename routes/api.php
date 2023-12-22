<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UsersController;
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


// Auth Routes

Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);


// Users Routes
// any action on this routes should be authenticated (require token)
Route::middleware('auth:sanctum')->apiResource('users', UsersController::class);


// products routes
// any action on this routes should be authenticated (require token)
Route::middleware('auth:sanctum')->apiResource('products', ProductController::class);
