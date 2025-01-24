<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|----------------------------------------------------------------------
| API Routes
|----------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'apiRegister']);
    Route::post('/login', [AuthController::class, 'apiLogin']);
    Route::post('/logout', [AuthController::class, 'apiLogout'])->middleware('auth:sanctum');
    
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/profile', [AuthController::class, 'apiProfile']);
        Route::put('/profile', [AuthController::class, 'apiUpdateProfile']);
        Route::delete('/profile', [AuthController::class, 'apiDeleteProfile']);

        // Route untuk mengambil semua pengguna
        Route::get('/users', [AuthController::class, 'apiGetUsers']);

        // Route untuk mengambil data pengguna berdasarkan ID
        Route::get('/users/{id}', [AuthController::class, 'apiGetUserById']);

        // Route untuk mengupdate data pengguna berdasarkan ID
        Route::put('/users/{id}', [AuthController::class, 'apiUpdateUserById']);

        // Route untuk menghapus pengguna berdasarkan ID
        Route::delete('/users/{id}', [AuthController::class, 'apiDeleteUserById']);
    });
});
