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

      //Registramos el controlador
        $this->app->make('DanielGarcia\PackageUserLaravel\UsuariosController');
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

      $this->publishes([
        __DIR__.'/views' => base_path('src/views'),
      ]);
      $this->publishes([
        __DIR__.'/Controllers' => app_path('Http/Controllers')
      ]);
      $this->publishes([
        __DIR__.'/Models' => app_path('Http/Models')
      ]);


    }

}
