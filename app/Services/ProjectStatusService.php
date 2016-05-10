<?php namespace App\Services;

use App\Repositories\ProjectStatusRepository;

class ProjectStatusService
{
    private $projectStatusRepository;

    public function __construct(){
        $this->projectStatusRepository = new ProjectStatusRepository();
    }

}