<?php

use Illuminate\Support\Facades\Route;

Route::get('all-roles','RoleController@index')->name('Admin.all-roles');
Route::get('add-roles','RoleController@add_roles')->name('Admin.add-roles');
// Route::get('test','RoleController@test')->name('Admin.test');
Route::post('save-roles','RoleController@save_roles')->name('Admin.save-roles');
Route::get('edit-roles/{id}','RoleController@edit_roles')->name('Admin.edit-roles');
Route::post('update-roles/{id}','RoleController@update_roles')->name('Admin.update-roles');
Route::get('delete-roles/{id}','RoleController@delete_roles')->name('Admin.delete-roles');
