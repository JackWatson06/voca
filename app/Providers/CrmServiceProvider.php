<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Services\Crm\CrmAdapterContract;
use App\Services\Crm\EngageBayAdapter;

class CrmServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CrmAdapterContract::class, function() {
            // $crmClassName = config("app.crm");
            return new EngageBayAdapter(config("app.crm_token"));
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
