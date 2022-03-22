<?php

namespace App\Providers;

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
      //  $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'packageprovider');
        $this->app->make('\PackageUserLaravel\PackageProvider');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

      //Cargar las vistas
      $this->loadViewsFrom(__DIR__.'/resources/views', 'packageprovider');
      $this->loadRoutesFrom(__DIR__.'/routes.php');
      $this->loadMigrationsFrom(__DIR__.'/migrations');

      //Para cargar las rutas
      //$this->loadRoutesFrom(__DIR__.'/routes/web.php');

      //Para cargar migraciones + comando -> php artisan migrate
      //$this->loadMigrationsFrom(__DIR__.'/database/migrations');

      $this->publishes([
        __DIR__.'/views' => base_path('src/views'),
      ]);
      $this->publishes([
        __DIR__.'/Controllers' => app_path('Http/Controllers')
      ]);
      $this->publishes([
        __DIR__.'/Models' => app_path('Http/Models')
      ]);

      /*$this->publishes([
        __DIR__'/../public' => public_path('vendor/package'),
      ], 'public');*/
    }

}
