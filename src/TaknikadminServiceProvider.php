<?php

namespace Moolchand\Taknikadmin;

use Illuminate\Support\ServiceProvider;

class TaknikadminServiceProvider extends ServiceProvider
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
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/views', 'taknikadmin');
        $this->publishes([
            __DIR__ . '/public/assets' => public_path('assets/'),
        ], 'public assets');
        $this->publishes([
            __DIR__.'/config/entrust.php' => app()->basePath() . '/config/entrust.php',
        ]);
    }
}
