<?php
namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository {
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    abstract public function model() : string;

    // get ALL Data
    public function getAll() {
        $this->model->paginate(4);
    }

    // Create 
    public function store($data) {
        $this->model->create($data);
    }

    // find one
    public function find($id) {
        $this->model->findOrFail($id);
    }

    // Update
    public function update($data, $id) {
        $modelInstance  = $this->model->find($id);
        $modelInstance->update($data);
    }

    // delete
    public function destroy($id) {
        $modelInstance = $this->model->find($id);
        $modelInstance->delete();    
    }
}
?>