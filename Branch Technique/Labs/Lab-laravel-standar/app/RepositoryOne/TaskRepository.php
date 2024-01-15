<?php

  namespace App\Repository;

use App\Models\Tasks;

  abstract class TaskRepository {
    protected $model;

    public function __construct(Tasks $projects)
    {
        $this->model = $projects;
    }

    public function model() : string {
        return Tasks::class;
    }
  }

?>