<?php namespace App\Repositories;

use Auth;
use App\Campaign;

class CampaignRepository extends BaseRepository
{
    /** @var array $customRules */
    public $customRules;

    public function __construct(){
        $this->customRules = [
            'name' => 'unique:campaigns,name,' . Auth::user()->id,
        ];

        $this->model = new Campaign();
    }
}