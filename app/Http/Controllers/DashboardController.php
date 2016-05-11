<?php

namespace App\Http\Controllers;

use Auth;
use App\Campaign;
use Illuminate\Http\Request;
use App\Http\Requests;

class DashboardController extends Controller
{
    public function index(){
        $campaigns = Campaign::ByUserId(Auth::user()->id)->get();

        return view('dashboard.my-campaigns', [
            'heading' => 'My campaigns',
            'campaigns' => $campaigns
        ]);
    }

    public function messages(){
        return view('dashboard.messages', [
            'heading' => 'Messages'
        ]);
    }

    public function notifications(){
        return view('dashboard.notifications', [
            'heading' => 'Notifications'
        ]);
    }
}
