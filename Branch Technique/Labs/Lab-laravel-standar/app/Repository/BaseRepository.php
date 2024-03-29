<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository {

    protected $model;

    public function __construct(Model $model){ 
        $this->model = $model;
    }

    abstract public function getFieldData(): array;
    abstract public function model(): string;

    public function getAll($perPage = 4)
    {
        return $this->model->paginate($perPage);
    }

    public function create(array $data)
    {
        $fillableData = collect($data)->only($this->getFieldData())->all();
        $this->model->create($fillableData);
    }

    public function find($id){
        return $this->model->findOrFail($id);
    }

    public function update(array $data, $id)
    {
        $project = $this->model->find($id);

        if (!$project) {
            return false; 
        }

        $fillableData = collect($data)->only($this->getFieldData())->all();

        return $project->update($fillableData);
    }

    //  delete    
    public function destroy($id){    
      return $this->model->destroy($id);
    }
    
}
