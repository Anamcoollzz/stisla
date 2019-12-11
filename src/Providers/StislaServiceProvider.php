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
        dd('dssd');
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'anamcoollzz');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'anamcoollzz');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
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
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../../config/stisla.php' => config_path('stisla.php'),
        ], 'stisla.config');

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
