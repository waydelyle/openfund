<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Project;

class IndexController extends Controller
{
    /**
     * Display all projects
     *
     * @return mixed
     */
    public function index(){
        $projects = Project::all();

        return view('welcome', ['projects' => $projects]);
    }
}
