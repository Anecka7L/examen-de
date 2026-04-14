<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return redirect('/login');
});

// Гостевые маршруты
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Авторизованные пользователи
Route::middleware('auth')->group(function () {
    Route::get('/applications', [ApplicationController::class, 'index']);
    
    Route::post('/applications', [ApplicationController::class, 'store']);
    Route::post('/applications/{application}/review', [ApplicationController::class, 'review']);
});