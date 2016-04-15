<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ProjectController extends Controller
{
    /**
     * Return the create project view
     *
     * @return mixed
     */
    public function create(){
        
        return view('projects.create')->with([
            'heading' => 'Create Project',
        ]);
    }

    /**
     * Return edit project view
     *
     * @param $projectId
     * @return mixed
     */
    public function edit($projectId) {

        return view('projects.edit')->with([
            'heading' => 'Edit',
            'projectName',
            'projectDescription',
            'projectFunding',
            'projectCategory'
        ]);
    }

    /**
     * Insert project data into database
     *
     * @param Request $request
     */
    public function createProject(
        Request $request
    ) {
        $user = $request->user();
    }

    /**
     * Edit project data
     *
     * @param Request $request
     */
    public function editProject(
        Request $request
    ) {
        $user = $request->user();
    }

    /**
     * Delete project
     *
     * @param $projectId
     */
    public function deleteProject($projectId) {
        
    }
}
