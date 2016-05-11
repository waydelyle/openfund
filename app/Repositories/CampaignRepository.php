<?php namespace App\Repositories;

use App\Campaign;

class CampaignRepository extends BaseRepository
{
    public function __construct(){
        $this->model = new Campaign();
    }
}