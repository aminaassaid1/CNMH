<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use App\Http\Requests\StoreTasksRequest;
use App\Http\Requests\UpdateTasksRequest;
use App\Repository\ProjectRepository;
use App\Repository\TaskRepository;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    protected $taskRepository;
    protected $projectRepository;

    public function __construct(TaskRepository $taskRepository, ProjectRepository $projectRepository)
    {
        $this->taskRepository = $taskRepository;
        $this->projectRepository = $projectRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $searchQuery = $request->get('searchValue');
            $searchQuery = str_replace(' ', '%', $searchQuery);
            $tasks = $this->taskRepository->searchTasks($searchQuery);
    
            return view('tasks.search', compact('tasks'))->render();
        }

        $projects = $this->projectRepository->getAll();
        $project = $projects->first();
        $tasks = $this->taskRepository->getTasksByProjectId($project->id);

        return view('tasks.index', compact('tasks', 'project', 'projects'));
    }

    public function getTasksByProjectId($projectId) {

        $projects = $this->projectRepository->getAll();
        $tasks = $this->taskRepository->getTasksByProjectId($projectId);
        $project = $this->projectRepository->find($projectId);

        return view('tasks.index', compact('tasks', 'project', 'projects'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = $this->projectRepository->getAll();
        return view('tasks.create', compact('projects'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTasksRequest $request)
    {
        $validtatedData = $request->validated();
        $this->taskRepository->create($validtatedData);

        return redirect()->route('projects.tasks', ['projectId' => $request->projetId])
                        ->with('success', 'Les tâches ont été ajoutées avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show($task)
    {
        $task = $this->taskRepository->find($task);
        $project = $this->projectRepository->find($task->projetId);

        return view('tasks.show', compact('task', 'project'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($task)
    {
        $projects = $this->projectRepository->getAll();
        $task = $this->taskRepository->find($task);
        return view('tasks.edit', compact('task','projects'));    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTasksRequest $request, $tach)
    {
        $data = $request->validated(); 
        $this->taskRepository->update($data, $tach);

        return redirect()->route('projects.tasks', ['projectId' => $request->projetId])
                        ->with('success', 'Les tâches ont été modifier avec succès.');    
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($task)
    {
        $this->taskRepository->destroy($task);

        return redirect()->back()->with('success', 'La tâche a été supprimée avec succès.');;
    }
}
