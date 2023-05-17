<?php

namespace App\Providers;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
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
        # Next line is use to declare a global variable in all views using ENV VARIABLE
        /* view()->composer('*', function ($view) {
            $view->with('PATH', env('BASE_PATH'));
        }); */
        view()->composer('*', function ($view) {
            $view->with('roles', []);
        }); 
        JsonResource::withoutWrapping();
    }
}
