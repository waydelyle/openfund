<?php namespace App\Facades;
use Illuminate\Support\Facades\Facade;

class UserModule extends Facade{
    protected static function getFacadeAccessor() { return \App\Modules\UserModule::class; }
}