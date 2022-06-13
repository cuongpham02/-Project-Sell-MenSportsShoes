<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AuthController;

Route::get('/login', [AuthController::class, 'showLogin'])->name('show-login');
Route::post('/do-login', [AuthController::class, 'doLogin'])->name('do-login');
Route::get('/logout', [AuthController::class, 'doLogout'])->middleware(['auth:web'])->name('do-logout');
