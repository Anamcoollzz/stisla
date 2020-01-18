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

        \Schema::defaultStringLength(191);
        \Route::resourceVerbs([
            'create'    => 'tambah',
            'edit'      => 'ubah',
        ]);

        \Blade::include('stisla.components.input', 'input');
        \Blade::include('stisla.components.email', 'email');
        \Blade::include('stisla.components.password', 'password');
        \Blade::include('stisla.components.number', 'number');
        \Blade::include('stisla.components.gambar', 'gambar');
        \Blade::include('stisla.components.gambar', 'image');
        \Blade::include('stisla.components.file', 'file');
        \Blade::include('stisla.components.excel', 'excel');
        \Blade::include('stisla.components.textarea', 'textarea');
        \Blade::include('stisla.components.select', 'select');
        \Blade::include('stisla.components.select2', 'select2');
        \Blade::include('stisla.components.datepicker', 'datepicker');
        \Blade::include('stisla.components.timemask', 'timemask');
        \Blade::include('stisla.components.uangmask', 'uangmask');
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

        $config         = [__DIR__ . '/../../config/stisla.php' => config_path('stisla.php')];
        $config[__DIR__ . '/../config/app.php'] = config_path('app.php');
        $public         = [__DIR__ . '/../public' => public_path('stisla')];
        $views          = [__DIR__ . '/../resources/views' => resource_path('views/stisla')];
        $lang           = [__DIR__ . '/../resources/lang' => resource_path('lang')];
        $controllers    = [__DIR__ . '/../controllers' => base_path('app\Http\Controllers\Stisla')];
        $middleware     = [__DIR__ . '/../Middleware' => base_path('app\Http\Middleware')];
        $models         = [__DIR__ . '/../Models' => base_path('app\Models')];
        $migrations     = [__DIR__ . '/../database/migrations' => base_path('database\migrations')];
        $seeds          = [__DIR__ . '/../database/seeds' => base_path('database\seeds')];
        $batch          = [__DIR__ . '/../hehe.bat' => base_path('hehe.bat')];
        $composer       = [__DIR__ . '/../composer/composer.json' => base_path('composer.json')];
        $helpers        = [__DIR__ . '/../Helpers' => base_path('app/Helpers')];
        $user_model     = [__DIR__ . '/../User.php' => base_path('app/User.php')];
        $route          = [__DIR__ . '/../routes/stisla.php' => base_path('routes/stisla.php')];
        $service_provider          = [__DIR__ . '/../Providers/RouteServiceProvider.php' => base_path('app/Providers/RouteServiceProvider.php')];

        $this->publishes($config, 'stisla.config');
        $this->publishes($public, 'stisla.public');
        $this->publishes($views, 'stisla.views');
        $this->publishes($lang, 'stisla.lang');
        $this->publishes($controllers, 'stisla.controllers');
        $this->publishes($middleware, 'stisla.middleware');
        $this->publishes($models, 'stisla.models');
        $this->publishes($migrations, 'stisla.migrations');
        $this->publishes($seeds, 'stisla.seeds');
        $this->publishes($batch, 'stisla.batch');
        $this->publishes($composer, 'stisla.composer');
        $this->publishes($helpers, 'stisla.helpers');
        $this->publishes($user_model, 'stisla.user_model');
        $this->publishes($service_provider, 'stisla.ser$service_provider');
        $this->publishes($route, 'stisla.route');

        $all = array_merge($config, $public, $views, $lang, $controllers, $middleware, $models, $migrations, $seeds, $batch, $composer, $helpers, $user_model, $route, $service_provider);

        $this->publishes($all, 'stisla.all');


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
