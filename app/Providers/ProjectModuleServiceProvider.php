<?php namespace App\Providers;

use App\Modules\ProjectModule;
use Illuminate\Support\ServiceProvider;

class ProjectModuleServiceProvider extends ServiceProvider
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
        $this->app->singleton(ProjectModule::class, function($app){
            return new ProjectModule();
        });
    }
}
