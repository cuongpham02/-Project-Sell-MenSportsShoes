<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;

Route::get('/',[UserController::class,'index_users_new'])->name('all-users-new');
Route::get('/create',[UserController::class,'add_users_new'])->name('add-users-new');
Route::post('save-users-new',[UserController::class,'save_users_new'])->name('save-users-new');
Route::get('edit-users-new/{id}',[UserController::class,'edit_user_new'])->name('edit-users-new');
Route::post('update-users-new/{id}',[UserController::class,'update_user_new'])->name('update-users-new');
