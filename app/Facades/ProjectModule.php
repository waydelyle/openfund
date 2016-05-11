<?php namespace App\Facades;
use Illuminate\Support\Facades\Facade;

class CampaignModule extends Facade{
    protected static function getFacadeAccessor() { return \App\Modules\CampaignModule::class; }
}