<?php namespace App\Http\Controllers;

use Auth;
use App\Http\Requests;

class UserController extends Controller
{
    /**
     * Direct the logged in user to home page
     *
     * @return mixed
     */
    public function index(){
        return view('user.index');
    }

    /**
     * Direct the user to create & edit their profile.
     *
     */
    public function profile(){

        return view('user.profile');
    }
}
