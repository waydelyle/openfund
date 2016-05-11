<?php namespace App\Services;

use App\CampaignStatus;
use App\RecordStatus;
use App\Repositories\CampaignRepository;

class CampaignService
{
    private $campaignRepository;

    public function __construct(){
        $this->campaignRepository = new CampaignRepository();
    }

    /**
     * Creates a new campaign, adds relative data and returns the newly
     * created campaigns id.
     *
     * @param array $data
     * @return int
     */
    public function createCampaign($data = []){
        $campaignId = $this->campaignRepository->validateAndCreate($data);

        return $campaignId;
    }
}