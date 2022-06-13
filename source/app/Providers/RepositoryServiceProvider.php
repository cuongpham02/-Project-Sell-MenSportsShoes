<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(\App\Repositories\Permission\PermissionRepository::class, \App\Repositories\Permission\PermissionRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Category\CategoryRepository::class, \App\Repositories\Category\CategoryRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\User\UserRepository::class, \App\Repositories\User\UserRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Role\RoleRepository::class, \App\Repositories\Role\RoleRepositoryEloquent::class);
        //:end-bindings:
    }
}
