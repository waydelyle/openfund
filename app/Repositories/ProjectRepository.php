<?php namespace App\Repositories;

use App\Project;

class ProjectRepository extends BaseRepository
{
    public function __construct(){
        $this->model = new Project();
    }
}