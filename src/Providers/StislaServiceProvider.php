<?php

namespace Anamcoollzz\Stisla\Providers;

use Illuminate\Support\ServiceProvider;

class StislaServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'anamcoollzz');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'anamcoollzz');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
        
        \Blade::include('stisla.components.input', 'input');
        \Blade::include('stisla.components.inputemail', 'email');
        \Blade::include('stisla.components.inputnumber', 'inputnumber');
        \Blade::include('stisla.components.inputimage', 'inputimage');
        \Blade::include('stisla.components.inputexcel', 'inputexcel');
        \Blade::include('stisla.components.textarea', 'textarea');
        \Blade::include('stisla.components.select', 'select');
        \Blade::include('stisla.components.datepicker', 'datepicker');
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/stisla.php', 'stisla');

        // Register the service the package provides.
        $this->app->singleton('stisla', function ($app) {
            return new Stisla;
        });

    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['stisla'];
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {

        $this->publishes([
            __DIR__.'/../../config/stisla.php' => config_path('stisla.php'),
        ], 'stisla.config');

        $this->publishes([
            __DIR__ . '/../public' => public_path('stisla'),
        ], 'public');

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('resources/views/stisla'),
        ], 'views');

        $this->publishes([
            __DIR__ . '/../resources/lang' => resource_path('resources/lang'),
        ], 'lang');

        $this->publishes([
            __DIR__ . '/../controllers' => base_path('app\Http\Controllers\Stisla'),
        ], 'controllers');

        $this->publishes([
            __DIR__ . '/../Middleware' => base_path('app\Http\Middleware'),
        ], 'middleware');

        $this->publishes([
            __DIR__ . '/../Models' => base_path('app'),
        ], 'models');

        $this->publishes([
            __DIR__ . '/../database/migrations' => base_path('database\migrations'),
        ], 'migrations');

        $this->publishes([
            __DIR__ . '/../database/seeds' => base_path('database\seeds'),
        ], 'seeds');

        $this->publishes([
            __DIR__ . '/../controllers' => base_path('app\Http\Controllers\Stisla'),
            __DIR__ . '/../resources/lang' => resource_path('lang'),
            __DIR__ . '/../resources/views' => resource_path('views/stisla'),
            __DIR__ . '/../../config/stisla.php' => config_path('stisla.php'),
            __DIR__ . '/../Models' => base_path('app'),
            __DIR__ . '/../public' => public_path('stisla'),
            __DIR__ . '/../database/migrations' => base_path('database\migrations'),
            __DIR__ . '/../database/seeds' => base_path('database\seeds'),
            __DIR__ . '/../Middleware' => base_path('app\Http\Middleware'),
        ], 'stisla.all');

        \Schema::defaultStringLength(191);
        \Route::resourceVerbs([
            'create'    => 'tambah',
            'edit'      => 'ubah',
        ]);


        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/anamcoollzz'),
        ], 'stisla.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/anamcoollzz'),
        ], 'stisla.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/anamcoollzz'),
        ], 'stisla.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
