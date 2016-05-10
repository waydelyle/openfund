<?php namespace App\Repositories;

use App\Project;

class ProjectRepository
{
    private $project;

    public function __construct(){
        $this->project = new Project();
    }

    /**
     * Creates a project and returns the newly created projects id.
     *
     * @param array $data
     * @return int $projectId
     */
    public function createProject($data = []){
        $projectId = $this->project->create($data)->id;

        return $projectId;
    }
}