<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
       Schema::defaultStringLength(191);
       view()->share([
        'counts' => 0,
        ]);
   }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // This for HTTPS CERTIFICATES
        if(env('FORCE_HTTPS',true)) {
            URL::forceScheme('https');
        }

        if (app()->environment('remote')) {
            URL::forceSchema('https');
        }
    }
}
