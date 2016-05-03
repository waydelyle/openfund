<?php namespace App\Providers;

use App\Modules\FormModule;
use Illuminate\Support\ServiceProvider;

class FormModuleServiceProvider extends ServiceProvider
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
        $this->app->singleton(FormModule::class, function($app){
            return new FormModule();
        });
    }
}
