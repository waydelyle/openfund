<?php  namespace App\Modules;

use App\Project;
use App\ProjectCategory;

/**
 * Class ProjectModule
 */
class ProjectModule {

    const DEFAULT_LIST_AMOUNT = 9;

    /**
     * Renders a list of projects.
     *
     * @param int $listAmount
     * @param null $category
     * @param int $userId
     * @return mixed
     */
    public static function listProjects($listAmount = self::DEFAULT_LIST_AMOUNT, $category = null, $userId = null)
    {
        $projectCategory = null;
        if(!empty($category)){
            $projectCategory = ProjectCategory::BySlug($category)->first();

            !empty($userId)
                ? $projects = Project::ByProjectCategoryId($projectCategory->id)->ByUserId($userId)->get()
                : $projects = Project::ByProjectCategoryId($projectCategory->id)->get();
        } else if(!empty($userId)) {
            $projects = Project::ByUserId($userId)->get();
        } else {
            $projects = Project::all();
        }

        return view('projects.listProjects', ['projects' => $projects, 'category', $projectCategory]);
    }

    /**
     * Displays a single project by id.
     *
     * @param $id
     * @return mixed
     */
    public static function display($id)
    {
        $project = Project::find($id);

        if(empty($project)){
            //todo wayde find correct way to throw http exceptions in laravel.
        }

        $percentFunded = self::percentFunded($project->amount, $project->amount);

        return view('projects.displayProject', ['project' => $project, 'percentFunded' => $percentFunded]);
    }

    /**
     * @param int $amountFunded
     * @param int $amountNeeded
     * @return int
     */
    public static function percentFunded($amountFunded, $amountNeeded)
    {
        $percentFunded = ($amountFunded / $amountNeeded) * 100;

        return (int) $percentFunded;
    }
}