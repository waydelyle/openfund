<?php namespace App\Http\Controllers;

use App\Modules\ProjectModule;
use App\Services\ProjectService;
use Auth;
use Validator;
use App\Project;
use App\ProjectCategory;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display all projects.
     *
     * @return mixed
     */
    public function index($projectCategorySlug = null){
        $projectCategory = null;
        if(!empty($projectCategorySlug)){
            $projectCategory = ProjectCategory::BySlug($projectCategorySlug)->first();

            !empty($userId)
                ? $projects = Project::ByProjectCategoryId($projectCategory->id)->ByUserId($userId)->get()
                : $projects = Project::ByProjectCategoryId($projectCategory->id)->get();
        } else if(!empty($userId)) {
            $projects = Project::ByUserId($userId)->get();
        } else {
            $projects = Project::all();
        }

        return view('projects.list', ['projects' => $projects]);
    }

    /**
     * Insert project data into database.
     *
     * @param Request $request
     */
    public function create(Request $request) {
        $input = $request->all();
        $loggedInUser = Auth::user();

        if ($loggedInUser == null) {
            return redirect('auth/register');
        }

        if(!empty($input)){
            $validator = Validator::make($input, Project::validationArray());

            if($validator->fails()) {
                //todo wayde fix the errors and don't use this route
                $errors = $validator->errors();
            } else {
                $projectService = new ProjectService();

                $id = $projectService->createProject([
                    'user_id' => $loggedInUser->id,
                    'name' => $input['name'],
                    'description' => $input['description'],
                    'amount' => $input['amount'],
                    'project_category_id' => $input['project_category_id'],
                    'project_status_id' => $input['project_category_id'],
                ]);

                return redirect("/edit-project/$id");
            }
        }

        return view('projects.create', [
            'heading' => 'Create Project',
            'errors' => isset($errors) ? $errors : null,
            'projectCategories' => ProjectCategory::lists('label', 'id')
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

        return view('projects.edit', [
            'heading' => 'Setup Project',
            'errors' => isset($errors) ? $errors : null,
            'name' => $project->name,
            'description' => $project->description,
            'amount' => $project->amount,
            'projectCategoryId' => $project->project_category_id,
            'projectCategories' => ProjectCategory::lists('label', 'id')
        ]);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function view($id){
        $project = Project::find($id);

        $percentFunded = ProjectModule::percentFunded($project);

        return view('projects.view', [
            'heading' => 'View',
            'projectId' => $id,
            'project' => $project,
            'percentFunded' => $percentFunded
        ]);
    }

    /**
     * Enables search by project.name.
     *
     * @param Request $request
     * @return mixed
     */
    public function search(Request $request){
        $foundProjects = Project::where('name', 'like', '%' . $request->get('search') . '%')->get();

        return view('projects.list-projects', ['projects' => $foundProjects]);
    }

    /**
     * Delete project.
     *
     * @param $id
     */
    public function deleteProject($id) {
        //this should be a soft delete that sets the record status to 2
    }

    /**
     * Displays projects available to edit.
     *
     * @return mixed
     */
    public function myProjects(){
        $projects = Project::ByUserId(Auth::user()->id)->get();

        return view('projects.list-projects', ['projects', $projects]);
    }
}
