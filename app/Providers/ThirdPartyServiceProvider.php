<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\ThirdParty\ThirdPartyService;

class ThirdPartyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ThirdPartyService::class, function ($app) {
            return new ThirdPartyService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
