<?php

namespace App\Providers;

use App\Helpers\DateHelper;
use Carbon\Carbon;
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

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(DateHelper::class, function($app) {
            return new DateHelper($app->make(Carbon::class));
        });
    }
}
