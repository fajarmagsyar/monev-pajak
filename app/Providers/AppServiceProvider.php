<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Users;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        Gate::define('admin', function (Users $users) {
            return $users->hasRole('Admin');
        });
        Gate::define('juruPajak', function (Users $users) {
            return $users->hasRole('Juru Pajak');
        });
        Gate::define('owner', function (Users $users) {
            return $users->hasRole('Owner');
        });
    }
}
