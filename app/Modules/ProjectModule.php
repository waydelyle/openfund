<?php  namespace App\Modules;

use App\Project;
use App\ProjectCategory;
use App\Services\PaymentService;

/**
 * This class is used as a helper in
 * views to use methods without namespacing.
 *
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

        return view('projects.list-projects', ['projects' => $projects, 'category', $projectCategory]);
    }

    /**
     * @param Project $project
     * @return int
     */
    public static function percentFunded(Project $project)
    {
        $paymentService = new PaymentService();
        $totalAmountFunded = $paymentService->findTotalAmountFunded($project);
        $percentFunded = $paymentService->percentFunded($project->amount, $totalAmountFunded);

        return (int) $percentFunded;
    }

    /**
     * @return mixed
     */
    public static function renderNavigationDropDown(){
        $categories = ProjectCategory::all();
        
        return view('partials.project-navigation-dropdown', ['categories' => $categories]);
    }
}