<?php

namespace App\Repository;

use App\Models\Tasks;
use App\Repository\BaseRepository;

class TaskRepository extends BaseRepository{

    public function __construct(Tasks $model){
        $this->model = $model;
    }

    protected $fieldsTask = [
        'nom','description','projetId'
    ];

    public function getFieldData():array{
        return $this->fieldsTask;
    }

    public function model():string{
        return Tasks::class;
    }

    public function getTasksByProjectId($projectId, $perPage = 3) {
        $tasks = $this->model->where('projetId', $projectId)->paginate($perPage);
        return $tasks;
    }

    
    public function searchTasks($searchTask, $perPage = 4)
    {
        return Tasks::where(function ($query) use ($searchTask) {
            $query->where('nom', 'like', '%' . $searchTask . '%')
                ->orWhere('description', 'like', '%' . $searchTask . '%');
        })->paginate($perPage);
    }
}