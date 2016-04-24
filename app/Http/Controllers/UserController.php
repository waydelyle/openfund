<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $loggedInUser = Auth::user();

        return view('user.index', ['user' => $loggedInUser]);
    }
}
