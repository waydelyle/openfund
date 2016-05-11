<?php namespace App\Services;

use Auth;
use App\Payment;
use App\Campaign;
use App\Repositories\PaymentRepository;

class PaymentService
{
    private $paymentRepository;

    public function __construct(){
        $this->paymentRepository = new PaymentRepository();
    }

    /**
     * Creates a new payment in pending status.
     *
     * @param array $data
     * @return int
     */
    public function createPayment($data = []){
        $paymentId = $this->paymentRepository->validateAndCreate($data);

        return $paymentId;
    }

    /**
     * @param Campaign $campaign
     * @return int
     */
    public function findTotalAmountFunded(Campaign $campaign){
        $foundPayments = $this->paymentRepository->findAllByCampaign($campaign);

        $totalFunded = 0;
        foreach($foundPayments as $payment){
            $totalFunded += $payment->amount;
        }

        return $totalFunded;
    }

    /**
     * @param int $amountNeeded
     * @param int $amountFunded
     * @return int
     */
    public function percentFunded($amountNeeded, $amountFunded){

        $percentFunded = ($amountFunded / $amountNeeded) * 100;

        return (int) $percentFunded;
    }
}