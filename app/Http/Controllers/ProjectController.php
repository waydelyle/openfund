<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Project;
use App\ProjectCategory;

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
     */
    public function createProject(Request $request) {
        $newProjectPostedData = $request->all();

        $loggedInUser = Auth::user();

        $project = new Project();

        if(!$project->create([
            'user_id' => $loggedInUser->id,
            'name' => $newProjectPostedData['inputProjectName'],
            'description' => $newProjectPostedData['inputProjectDescription'],
            'amount' => $newProjectPostedData['inputProjectFunding'],
            'project_category_id' => $newProjectPostedData['inputCategorySelect'],
        ])){
            die('fucked out');
        } else {
            return view('welcome');
        }
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
