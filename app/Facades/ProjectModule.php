<?php namespace App\Facades;
use Illuminate\Support\Facades\Facade;

class ProjectModule extends Facade{
    protected static function getFacadeAccessor() { return \App\Modules\ProjectModule::class; }
}