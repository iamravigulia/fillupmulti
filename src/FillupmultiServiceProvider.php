<?php

namespace edgewizz\fillupmulti;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class FillupmultiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Edgewizz\Fillupmulti\Controllers\FillupmultiController');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // dd($this);
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadViewsFrom(__DIR__ . '/components', 'fillupmulti');
        Blade::component('fillupmulti::fillupmulti.open', 'fillupmulti.open');
        Blade::component('fillupmulti::fillupmulti.index', 'fillupmulti.index');
        Blade::component('fillupmulti::fillupmulti.edit', 'fillupmulti.edit');
    }
}
