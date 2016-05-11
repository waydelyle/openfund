<?php namespace App\Providers;

use App\Modules\CampaignModule;
use Illuminate\Support\ServiceProvider;

class CampaignModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(CampaignModule::class, function($app){
            return new CampaignModule();
        });
    }
}
