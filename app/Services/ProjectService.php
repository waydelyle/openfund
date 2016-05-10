<?php namespace App\Services;

use App\ProjectStatus;
use App\RecordStatus;
use App\Repositories\ProjectRepository;

class ProjectService
{
    private $projectRepository;

    public function __construct(){
        $this->projectRepository = new ProjectRepository();
    }

    /**
     * Creates a new project, adds relative data and returns the newly
     * created projects id.
     *
     * @param array $data
     * @return int
     */
    public function createProject($data = []){
        $data['project_status_id'] = ProjectStatus::PENDING_ID;
        $data['record_status_id'] = RecordStatus::ACTIVE_ID;

        $projectId = $this->projectRepository->createProject($data);

        return $projectId;
    }
}