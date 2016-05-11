<?php namespace App\Repositories;

use App\CampaignStatus;

class CampaignStatusRepository extends BaseRepository
{
    private $campaignStatus;

    public function __construct(){
        $this->campaignStatus = new CampaignStatus();
    }
}