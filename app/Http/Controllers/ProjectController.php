<?php namespace App\Http\Controllers;

use Auth;
use Validator;
use App\Project;
use App\ProjectCategory;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Displays all projects or projects by category.
     *
     * @param null $projectCategorySlug
     * @return mixed
     */
    public function displayAllProjects($projectCategorySlug = null){
        $projectCategoryBySlug = ProjectCategory::BySlug($projectCategorySlug)->first();

        if(!empty($projectCategoryBySlug)) {
            $projects = Project::ByProjectCategoryId($projectCategoryBySlug->id)->get();
        }

        if(empty($projects)){
            $projects = Project::all();
        }

        return view('welcome', ['projects' => $projects]);
    }

    /**
     * Display all projects for the current logged in user.
     *
     * @return mixed
     */
    public function index(){
        $loggedInUser = Auth::user();

        //$projectsByUserId = Project::ByUserId($loggedInUser->id)->findAll();
        $projectsByUserId = Project::ByUserId($loggedInUser->id)->get();

        return view('projects.index', ['projects' => $projectsByUserId]);
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
                return redirect("/create")
                    ->withErrors($validator)
                    ->withInput($input);
            }

            $project = new Project();

            $project->create([
                'user_id' => $loggedInUser->id,
                'name' => $input['name'],
                'description' => $input['description'],
                'amount' => $input['amount'],
                'project_category_id' => $input['project_category_id'],
            ]);

            return redirect("/$project->id");
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

        $input = $request->all();

        $loggedInUser = Auth::user();

        if(!empty($input)){

            $validator = Validator::make($input, Project::validationArray());

            if($validator->fails()) {
                return redirect("/create")
                    ->withErrors($validator)
                    ->withInput($input);
            }

            $project->update([
                'user_id' => $loggedInUser->id,
                'name' => $input['name'],
                'description' => $input['description'],
                'amount' => $input['amount'],
                'project_category_id' => $input['project_category_id'],
            ]);

            return redirect("/$id");
        }

        return view('projects.create', [
            'heading' => 'Edit',
            'projectName' => $project->name,
            'projectDescription' => $project->description,
            'projectFunding' => $project->amount,
            'projectCategories' => ProjectCategory::all()
        ]);
    }

    public function view($id){
        return view('projects.view', [
            'heading' => 'View',
            'projectId' => $id
        ]);
    }

    /**
     * Delete project.
     *
     * @param $id
     */
    public function deleteProject($id) {
        //this should be a soft delete that sets the record status to 2
    }
}
