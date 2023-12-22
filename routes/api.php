<?php

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

// Route::post('/auth/register', [AuthController::class, 'login']);
// Route::post('/auth/login', [AuthController::class, 'registration']);


// Users Routes
// Route::middleware('auth:sanctum')->apiResource('users', UsersController::class);

Route::apiResource('users', UsersController::class);
