<?php

use App\Http\Controllers\Admin\RoleController;
use Illuminate\Support\Facades\Route;

Route::get('/',[RoleController::class, 'index'])->name('index');
Route::get('create',[RoleController::class, 'create'])->name('create');
Route::get('{role}',[RoleController::class, 'edit'])->name('edit');
Route::get('get-soft-delete-roles',[RoleController::class, 'onlyTrashed'])->name('soft-delete');
Route::get('restore/{id}',[RoleController::class, 'restore'])->name('restore');
Route::post('',[RoleController::class, 'store'])->name('store');
Route::patch('{id}',[RoleController::class, 'update'])->name('update');
Route::delete('{id}',[RoleController::class, 'delete'])->name('delete');
Route::delete('force-delete/{id}',[RoleController::class, 'forceDelete'])->name('force-delete');
