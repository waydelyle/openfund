<?php

namespace App\Http\Controllers;

use Auth;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Requests;

class DashboardController extends Controller
{
    public function index(){
        $projects = Project::ByUserId(Auth::user()->id)->get();

        return view('dashboard.my-projects', [
            'heading' => 'My projects',
            'projects' => $projects
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
