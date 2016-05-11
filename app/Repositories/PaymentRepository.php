<?php namespace App\Repositories;

use App\Payment;
use App\Campaign;

class PaymentRepository extends BaseRepository
{

    public function __construct()
    {
        $this->model = new Payment();
    }

    /**
     * @param Campaign $campaign
     * @return Payment[]
     */
    public function findAllByCampaign(Campaign $campaign){
        $paymentsFound = Payment::ByCampaignId($campaign->id)->get();

        return $paymentsFound;
    }
}