<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    //    public array $bindings = [
    //        FileStorageServiceContract::class => FileStorageService::class,
    //
    //    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //якщо я хочу клас-одинак:
        //$this->app->singleton(\App\Models\UserInterface, \App\Models\User);
        //        $this->app->when()
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
