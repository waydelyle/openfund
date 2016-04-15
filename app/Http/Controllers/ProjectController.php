<?php

namespace App\Http\Controllers;

use App\ProjectCategory;
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
            'projectCategories' => ProjectCategory::all(),
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
            'projectCategories' => ProjectCategory::all(),
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


    public function editProject(

    ) {
        
    }

    /**
     * Delete project
     *
     * @param $projectId
     */
    public function deleteProject($projectId) {

    }
}
