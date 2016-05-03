<?php  namespace App\Modules;

use App\Project;
use App\ProjectCategory;

/**
 * Class ProjectModule
 */
class ProjectModule {

    /**
     * Renders a list of projects.
     *
     * @param int $listAmount
     * @param null $category
     * @return mixed
     */
    public static function listProjects($listAmount = 9, $category = null)
    {

        $projectCategory = null;
        if(!empty($category)){
            $projectCategory = ProjectCategory::BySlug($category)->first();
            $projects = Project::ByProjectCategoryId($projectCategory->id)->get();
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
        $percentFunded = $amountNeeded - $amountFunded;
        $percentFunded = 50;

        return (int) $percentFunded;
    }
}