<?php namespace App\Facades;
use Illuminate\Support\Facades\Facade;

class FormModule extends Facade{
    protected static function getFacadeAccessor() { return \App\Modules\FormModule::class; }
}