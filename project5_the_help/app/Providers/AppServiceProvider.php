<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // Use Bootstrap pagination view
        Paginator::useBootstrapFour();
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        //
    }
}
