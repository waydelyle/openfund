<?php namespace App\Services;

use App\Repositories\CampaignStatusRepository;

class CampaignStatusService
{
    private $campaignStatusRepository;

    public function __construct(){
        $this->campaignStatusRepository = new CampaignStatusRepository();
    }

}