<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AuthController;

Route::get('/login', [AuthController::class, 'showFormLogin'])->name('show-login');
Route::post('/login', [AuthController::class, 'Login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->middleware(['auth:web'])->name('logout');

//Route::get('register-auth',[AuthController::class,'register_auth'])->name('Admin.show-form-register');
//Route::post('register-save',[AuthController::class,'register_save'])->name('Admin.register');

