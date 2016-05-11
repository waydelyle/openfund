<?php  namespace App\Modules;

use App\Campaign;
use App\CampaignCategory;
use App\Services\PaymentService;

/**
 * This class is used as a helper in
 * views to use methods without namespacing.
 *
 * Class CampaignModule
 */
class CampaignModule {

    /**
     * @param Campaign $campaign
     * @return int
     */
    public static function percentFunded(Campaign $campaign)
    {
        $paymentService = new PaymentService();
        $totalAmountFunded = $paymentService->findTotalAmountFunded($campaign);
        $percentFunded = $paymentService->percentFunded($campaign->amount, $totalAmountFunded);

        return (int) $percentFunded;
    }

    /**
     * @return mixed
     */
    public static function renderNavigationDropDown(){
        $categories = CampaignCategory::all();
        
        return view('partials.campaign-navigation-dropdown', ['categories' => $categories]);
    }
}