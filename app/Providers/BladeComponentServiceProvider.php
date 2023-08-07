<?php

namespace App\Providers;

use Illuminate\Support\facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeComponentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        Blade::component('dashboard.index', 'admin-dashboard-layout');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
