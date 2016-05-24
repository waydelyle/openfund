<?php namespace App\Services;

use Auth;
use App\Repositories\CampaignRepository;

class CampaignService
{
    /** @var CampaignRepository $campaignRepository */
    private $campaignRepository;

    public function __construct(){
        $this->campaignRepository = new CampaignRepository();
    }

    /**
     * Creates a new campaign, adds relative data and returns the newly
     * created campaigns id.
     *
     * @param array $data
     * @return bool|int
     */
    public function createCampaign($data = []){

        if( ! isset($data['user_id'])){
            $data['user_id'] = Auth::user()->id;
        }

        $campaignId = $this->campaignRepository->validateAndCreate($data);

        return $campaignId;
    }

    /**
     * Updates a campaign and bool depending on whether the campaign was
     * updated or not.
     *
     * @param array $data
     * @return bool
     */
    public function updateCampaign($data = []){

        if( ! isset($data['user_id'])){
            $data['user_id'] = Auth::user()->id;
        }

        $updatedSuccessfully = $this->campaignRepository->validateAndUpdate($data);

        return $updatedSuccessfully;
    }
}