<?php namespace App\Http\Controllers;

use App\User;
use Auth;
use Validator;
use App\Campaign;
use App\CampaignCategory;
use Illuminate\Http\Request;
use App\Modules\CampaignModule;
use App\Repositories\CampaignRepository;

class CampaignController extends Controller
{
    /**
     * Display all campaigns.
     *
     * @param $campaignCategorySlug
     * @return mixed
     */
    public function index($campaignCategorySlug = null){
        $campaignCategory = null;
        if(!empty($campaignCategorySlug)){
            $campaignCategory = CampaignCategory::BySlug($campaignCategorySlug)->first();

            !empty($userId)
                ? $campaigns = Campaign::ByCampaignCategoryId($campaignCategory->id)->ByUserId($userId)->get()
                : $campaigns = Campaign::ByCampaignCategoryId($campaignCategory->id)->get();
        } else if(!empty($userId)) {
            $campaigns = Campaign::ByUserId($userId)->get();
        } else {
            $campaigns = Campaign::all();
        }

        return view('campaigns.list', ['campaigns' => $campaigns]);
    }

    /**
     * Insert campaign data into database.
     *
     * @param Request $request
     */
    public function create(Request $request) {
        if(!empty($request->all())){
            $campaignRepository = new CampaignRepository();

            $id = $campaignRepository->validateAndCreate([
                'user_id' => Auth::user()->id,
                'name' => $request->get('name'),
                'description' => $request->get('description'),
                'amount' => $request->get('amount'),
                'campaign_category_id' => $request->get('campaign_category_id'),
            ]);

            return redirect("/edit-campaign/$id");
        }

        return view('campaigns.create', [
            'heading' => 'Create Campaign',
            'errors' => isset($errors) ? $errors : null,
            'campaignCategories' => CampaignCategory::lists('label', 'id')
        ]);
    }

    /**
     * Return edit campaign view.
     *
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function edit(Request $request, $id) {

        $campaign = Campaign::find($id);

        return view('campaigns.edit', [
            'heading' => 'Setup Campaigns',
            'errors' => isset($errors) ? $errors : null,
            'name' => $campaign->name,
            'description' => $campaign->description,
            'amount' => $campaign->amount,
            'campaignCategoryId' => $campaign->campaign_category_id,
            'campaignCategories' => CampaignCategory::lists('label', 'id')
        ]);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function view($id){
        $campaign = Campaign::find($id);
        $users = User::where('id', '!=', Auth::id())->get();
        $percentFunded = CampaignModule::percentFunded($campaign);

        return view('campaigns.view', [
            'heading' => 'View',
            'campaignId' => $id,
            'campaign' => $campaign,
            'percentFunded' => $percentFunded,
            'users' => $users
        ]);
    }

    /**
     * Enables search by campaign.name.
     *
     * @param Request $request
     * @return mixed
     */
    public function search(Request $request){
        $foundCampaigns = Campaign::where('name', 'like', '%' . $request->get('search') . '%')->get();

        return view('campaigns.list-campaigns', ['campaigns' => $foundCampaigns]);
    }

    /**
     * Delete campaign.
     *
     * @param $id
     */
    public function deleteCampaign($id) {
        //this should be a soft delete that sets the record status to 2
    }
}
