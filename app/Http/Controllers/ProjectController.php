<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ProjectController extends Controller
{
    public function create(){
        
        return view('projects.create')->with([
            'heading' => 'Create Project',
        ]);
    }

    public function edit() {

        return view('projects.edit')->with([
            'heading' => 'Edit',
            'projectName',
            'projectDescription',
            'projectFunding',
            'projectCategory'
        ]);
    }

    public function createProject(
        Request $request
    ) {
        
    }

    public function editProject(
        Request $request
    ) {
        
    }
    
    public function deleteProject() {
        
    }
}
