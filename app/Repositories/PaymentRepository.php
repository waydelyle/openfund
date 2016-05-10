<?php namespace App\Repositories;

use App\Payment;

class PaymentRepository
{
    private $payment;

    public function __construct(){
        $this->payment = new Payment();
    }

    /**
     * @param $data
     * @return int
     */
    public function createPayment($data = []){
        $paymentId = $this->payment->create($data)->id;

        return $paymentId;
    }

    /**
     * @param $projectId
     * @return Payment[]
     */
    public function findAllByProjectId($projectId){
        $paymentsFound = Payment::ByProjectId($projectId)->get();

        return $paymentsFound;
    }
}