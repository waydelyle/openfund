<?php namespace App\Repositories;

use App\Payment;
use App\Project;

class PaymentRepository extends BaseRepository
{

    public function __construct()
    {
        $this->model = new Payment();
    }

    /**
     * @param Project $project
     * @return Payment[]
     */
    public function findAllByProject(Project $project){
        $paymentsFound = Payment::ByProjectId($project->id)->get();

        return $paymentsFound;
    }
}