<?php namespace App\Http\Controllers;

use Auth;
use App\Project;
use App\ProjectCategory;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display all projects for the current logged in user.
     *
     * @return mixed
     */
    public function index(){
        $loggedInUser = Auth::user();

        $projectsByUserId = Project::byUserId($loggedInUser->id)->findAll();

        return view('projects.index', ['projects' => $projectsByUserId]);
    }

    /**
     * Insert project data into database.
     *
     * @param Request $request
     */
    public function create(Request $request) {
        $postedProjectData = $request->all();
        $loggedInUser = Auth::user();

        if ($loggedInUser == null) {
            return redirect('auth/register');
        }

        if(!empty($postedProjectData)){

            $project = new Project();

            if(!$project->create([
                'user_id' => $loggedInUser->id,
                'name' => $postedProjectData['inputProjectName'],
                'description' => $postedProjectData['inputProjectDescription'],
                'amount' => $postedProjectData['inputProjectFunding'],
                'project_category_id' => $postedProjectData['inputCategorySelect'],
            ]));

            return redirect('/projects');
        }

        return view('projects.create', [
            'heading' => 'Create Project',
            'projectCategories' => ProjectCategory::all()
        ]);
    }

    /**
     * Return edit project view.
     *
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function edit(Request $request, $id) {
        $project = Project::find($id);

        $newProjectPostedData = $request->all();

        $loggedInUser = Auth::user();

        if(!empty($newProjectPostedData)){


            if(!$project->update([
                'user_id' => $loggedInUser->id,
                'name' => $newProjectPostedData['inputProjectName'],
                'description' => $newProjectPostedData['inputProjectDescription'],
                'amount' => $newProjectPostedData['inputProjectFunding'],
                'project_category_id' => $newProjectPostedData['inputCategorySelect'],
            ]));

            return redirect('/projects');
        }

        return view('projects.create', [
            'heading' => 'Edit',
            'projectName' => $project->name,
            'projectDescription' => $project->description,
            'projectFunding' => $project->amount,
            'projectCategories' => ProjectCategory::all()
        ]);
    }

    /**
     * Delete project.
     *
     * @param $id
     */
    public function deleteProject($id) {

    }
}
