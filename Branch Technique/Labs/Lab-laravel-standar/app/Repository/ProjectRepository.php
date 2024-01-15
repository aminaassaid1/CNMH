<?php

namespace App\Repository;

use App\Models\Projects;
use App\Repository\BaseRepository;

class ProjectRepository extends BaseRepository {

    public function __construct(Projects $model){
        $this->model = $model;
    }

    protected $fieldsProject = [
        'name', 'description', 'start_date', 'end_date'
    ];

    public function getFieldData(): array{
        return $this->fieldsProject;
    }

    public function model(): string{
        return Projects::class;
    }

    public function searchProjects($searchTask, $perPage = 4)
    {
        return Projects::where(function ($query) use ($searchTask) {
            $query->where('nom', 'like', '%' . $searchTask . '%')
                ->orWhere('description', 'like', '%' . $searchTask . '%');
        })->paginate($perPage);
    }
}


