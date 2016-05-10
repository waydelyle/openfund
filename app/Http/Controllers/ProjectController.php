<?php namespace App\Http\Controllers;

use Auth;
use Validator;
use App\Project;
use App\ProjectCategory;
use Illuminate\Http\Request;
use App\Modules\ProjectModule;
use App\Repositories\ProjectRepository;

class ProjectController extends Controller
{
    /**
     * Display all projects.
     *
     * @param $projectCategorySlug
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
        if(!empty($request->all())){
            $projectRepository = new ProjectRepository();

            $id = $projectRepository->validateAndCreate([
                'user_id' => Auth::user()->id,
                'name' => $request->get('name'),
                'description' => $request->get('description'),
                'amount' => $request->get('amount'),
                'project_category_id' => $request->get('project_category_id'),
            ]);

            return redirect("/edit-project/$id");
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
}
