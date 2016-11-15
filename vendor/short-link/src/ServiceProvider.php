<?php namespace LaravelShort\ShortLink;

use Illuminate\Support\ServiceProvider as LServiceProvider;


class ServiceProvider extends LServiceProvider {


    public function boot()
    {
        
        //Указываем что пакет должен опубликовать при установке
        $this->publishes([__DIR__ . '/../config/' => config_path() . "/"], 'config');
        $this->publishes([__DIR__ . '/../public/' => public_path() . "/vendor/short-link/"], 'assets');
        $this->publishes([__DIR__ . '/../database/' => base_path("database")], 'database');

        // Routing
        if (! $this->app->routesAreCached()) {
            include __DIR__ . '/routes.php';
        }
        
        //Указывам где искать вью и какой неймспейс им задать
        $this->loadViewsFrom(__DIR__.'/../views', 'short-link');

    }

    public function register()
    {
        
    }
  
}