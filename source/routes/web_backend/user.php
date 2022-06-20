<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;

Route::get('/',[UserController::class, 'index'])->name('index');
Route::get('create',[UserController::class, 'create'])->name('create');
Route::get('{user}',[UserController::class, 'edit'])->name('edit');
Route::get('get-soft-delete-user',[UserController::class, 'onlyTrashed'])->name('soft-delete');
Route::get('restore/{id}',[UserController::class, 'restore'])->name('restore');
Route::post('',[UserController::class, 'store'])->name('store');
Route::patch('{id}',[UserController::class, 'update'])->name('update');
Route::delete('{id}',[UserController::class, 'delete'])->name('delete');
Route::delete('force-delete/{id}',[UserController::class, 'forceDelete'])->name('force-delete');
