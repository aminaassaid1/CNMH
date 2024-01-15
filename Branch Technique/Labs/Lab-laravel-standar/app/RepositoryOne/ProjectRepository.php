<?php

  namespace App\Repository;

use App\Models\Projects;

  abstract class ProjectRepository extends BaseRepository {
    protected $model;

    public function __construct(Projects $projects)
    {
        $this->model = $projects;
    }

    public function model() : string {
        return Projects::class;
    }
  }

?>