<?php namespace App\Services;

use Auth;
use App\Payment;
use App\Project;
use App\PaymentStatus;
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
        $data['payment_status_id'] = PaymentStatus::PENDING_ID;

        if( ! isset($data['user_id'])){
            $data['user_id'] = Auth::user()->id;
        }

        $paymentId = $this->paymentRepository->createPayment($data);

        return $paymentId;
    }

    /**
     * @param int $projectId
     * @return Payment[]
     */
    public function findAllPaymentsForProject($projectId){
        $paymentsFound = $this->paymentRepository->findAllByProjectId($projectId);

        return $paymentsFound;
    }

    /**
     * @param Project $project
     * @return int
     */
    public function findTotalAmountFunded(Project $project){
        $foundPayments = $this->findAllPaymentsForProject($project->id);

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