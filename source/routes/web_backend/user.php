<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;

Route::get('/', [UserController::class, 'index'])->name('index');
Route::get('/create', [UserController::class, 'create'])->name('create');
Route::get('/{user}', [UserController::class, 'edit'])->name('edit');
Route::post('store', [UserController::class, 'store'])->name('store');
Route::patch('/{user}', [UserController::class, 'update'])->name('update');
Route::delete('/{id}', [UserController::class, 'update'])->name('delete');
