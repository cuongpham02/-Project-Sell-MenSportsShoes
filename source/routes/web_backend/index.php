<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/auth')->as('auth.')->group(base_path('routes/web/auth.php'));

Route::middleware(['auth:web'])->group(function () {
    Route::prefix('/products')->as('products.')->group(base_path('routes/web/product.php'));
    Route::prefix('/users')->as('users.')->group(base_path('routes/web/user.php'));
    Route::prefix('/managers')->as('managers.')->group(base_path('routes/web/manager.php'));
    Route::prefix('/documents')->as('documents.')->group(base_path('routes/web/document.php'));
    Route::prefix('/industrial-waste')->as('industrial_waste.')->group(base_path('routes/web/industrial-waste.php'));
    Route::prefix('/notifications')->as('notifications.')->group(base_path('routes/web/notification.php'));
    Route::prefix('/categories')->as('categories.')->group(base_path('routes/web/category.php'));
});
