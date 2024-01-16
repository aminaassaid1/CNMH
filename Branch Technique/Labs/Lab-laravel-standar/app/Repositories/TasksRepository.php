<?php 
namespace App\Repositories ;
use App\Models\Task;
use App\Repositories\BaseRepository;

class TasksRepository extends BaseRepository
{
    
    public function __construct(Task $task){
        $this->model = $task;
    }

    protected $fileldTask = [
        'nom',
        'description',
        'projetId',
    ];
    public function getFieldData():array {
        return $this->fileldTask;
    }
    public function model():string {
        return Task::class;
    }
 

   public function  getTaskbyprojetId($projetId){
    return $this->model->where('projetId', $projetId)->paginate(4);
     
   }

   public function searchTasks($searchTask)
    {
        $get_data =  $this->model->where(function ($query) use ($searchTask) {
            $query->where('nom', 'like', '%' . $searchTask . '%')
                ->orWhere('description', 'like', '%' . $searchTask . '%');
        });

     

      
        return $get_data->paginate(4);

    
    }
 
}