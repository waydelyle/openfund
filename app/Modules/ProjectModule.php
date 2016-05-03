<?php  namespace App\Modules;
use App\Project;

/**
 * Class ProjectModule
 */
class ProjectModule {

    public static function listProjects(){

    }

    public static function display($id){
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
    public static function percentFunded($amountFunded, $amountNeeded){
        $percentFunded = $amountNeeded - $amountFunded;
        $percentFunded = 50;

        return (int) $percentFunded;
    }
}