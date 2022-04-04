<?php

namespace Danielgarcia\PackageUser;

use Illuminate\Support\ServiceProvider;

class PackageProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {


      $this->loadRoutesFrom(__DIR__.'/routes.php');
      //$this->loadMigrationsFrom(__DIR__.'/migrations');

      $this->publishes([
        __DIR__.'/views' => base_path('resources/views'),
      ]);
      $this->publishes([
        __DIR__.'/Controllers' => app_path('Http/Controllers')
      ]);
      $this->publishes([
        __DIR__.'/Models' => app_path('Models')
      ]);
      $this->publishes([
        __DIR__.'/public' => app_path('/../public')
      ]);
      $this->publishes([
        __DIR__.'./migrations' => database_path('migrations/')
      ]);
      $this->publishes([
        __DIR__.'./seeders' => database_path('seeders/')
      ]);
      $this->publishes([
        __DIR__.'./Middleware' => app_path('Http/Middleware')
      ]);

    }

}
