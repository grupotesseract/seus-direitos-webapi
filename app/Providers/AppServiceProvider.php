<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Faker\Factory as FakerFactory;
use Faker\Generator as FakerGenerator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \View::composer(
            'sindicatos.fields', 'App\ViewComposers\SindicatoComposer'
        );
        \View::composer(
            'users.fields', 'App\ViewComposers\UserSindicalistaComposer'
        );
    }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(FakerGenerator::class, function () {
            return FakerFactory::create('pt_BR');
        });
    }
}
