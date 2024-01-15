<?php 
namespace App\Repositories ;
use App\Models\Project;
use App\Repositories\BaseRepository;

class ProjectsRepository extends BaseRepository
{
    
    public function __construct(Project $project){
        $this->model = $project;
    }

    protected $fileldProject = [
        'nom' ,
        'description' 
    ];
    public function getFieldData():array {
        return $this->fileldProject;
    }
    public function model():string {
        return Project::class;
    }
  

    public function searchProjects($searchValue, $perPage = 4)
    {
      return $this->model
      ->where('nom', 'LIKE', '%' . $searchValue . '%')
      ->orWhere('description', 'LIKE', '%' . $searchValue . '%')
      ->paginate($perPage);
    }
    
}