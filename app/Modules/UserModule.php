<?php  namespace App\Modules;

Use Session;
use Cmgmyr\Messenger\Traits\Messagable;

/**
 * Class UserModule
 */
class UserModule {

    /**
     * Just a cleaner way to store Laravel sessions.
     *
     * @param $key
     * @param $value
     */
    public static function storeSession($key, $value){
        Session::put($key, $value);
    }

    /**
     * Just a cleaner way to get Laravel sessions.
     *
     * @param $key
     * @return mixed
     */
    public static function getSession($key){
        return Session::get($key);
    }

    /**
     * Just a cleaner way to delete Laravel Sessions.
     *
     * @param $key
     */
    public static function deleteSession($key){
        Session::forget($key);
    }
}