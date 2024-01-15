<?php

namespace App\Http\Controllers;
use App\Repositories\TasksRepository;
use Illuminate\Http\Request;
use App\Repositories\ProjectsRepository;
use App\http\Requests\StoreTaskRequest ;
use App\Http\Requests\UpdateTaskRequest;

class TasksController extends Controller
{

    protected $TasksRepository;
    protected $ProjectsRepository;
    public function __construct(TasksRepository $TasksRepository, ProjectsRepository $ProjectsRepository ){
        $this->TasksRepository = $TasksRepository;
        $this->ProjectsRepository = $ProjectsRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $projects = $this->ProjectsRepository->index();
    
       
        $projetId= $request ->projetId ;

        if($projetId) {
            $project = $this->ProjectsRepository->find($projetId);
            $Tasks = $this->TasksRepository->getTaskbyprojetId($projetId);
            return view("Tasks.index",Compact('Tasks','projects'));
            // dd($tasks);
        }
        $Tasks = $this->TasksRepository->index();

    //    dd($project);
        return view("Tasks.index",Compact('Tasks','projects'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = $this->ProjectsRepository->index(); 
        return view('tasks.create',Compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        $validatedData = $request->validated();
    
        $this->TasksRepository->create($validatedData);
    
        return redirect()->route('projects.tasks', ['projetId' => $request->projetId])->with('success', "Task successfully created");
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $projects = $this->ProjectsRepository->index(); 
        $task = $this->TasksRepository->find($id);
      return view('Tasks.edit',compact('task','projects'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, string $id)
    {
        $validatedata = $request->validated();
        $this->TasksRepository->update($validatedata,$id);
        return redirect()->route('projects.tasks',['projetId'=> $request->projetId])->with('success',"tasks update succefuly");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->TasksRepository->delete($id);
        return redirect()->back()->with('success', "tasks destroye successfully");
    }
}
