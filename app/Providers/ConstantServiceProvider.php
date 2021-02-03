<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Constant\Constant as ConstantService;
use App\Facades\Constant;

class ConstantServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
			$this->app->singleton('constant', function()
			{
				return new ConstantService;
			});
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Constant::load();
    }


}
