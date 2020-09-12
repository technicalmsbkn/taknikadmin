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
        ], 'publish assets');
        $this->publishes([
            __DIR__ . '/database/seed/UsersTableSeeder.php' => app()->basePath() . 'database/seeds/UsersTableSeeder.php'),
        ], 'publish seed');
        $this->publishes([
            __DIR__ . '/views/*' => app()->basePath() . 'resources/views/'),
        ], 'publish views');
        $this->publishes([
            __DIR__ . '/Http/Controllers/*' => app()->basePath() . 'app/Http/Controllers/'),
        ], 'publish controllers');
        $this->publishes([
            __DIR__ . '/Models/*' => app()->basePath() . 'app/'),
        ], 'publish models');

    }
}