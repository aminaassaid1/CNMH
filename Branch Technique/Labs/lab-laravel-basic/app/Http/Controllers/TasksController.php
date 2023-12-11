<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TasksController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 5;

        if (!empty($keyword)) {
            $tasks = Task::where('name', 'LIKE', "%$keyword%")
                ->latest()
                ->paginate($perPage);
        } else {
            $tasks = Task::latest()->paginate($perPage);
        }

        return view('Tasks.index', [
            'tasks' => $tasks,
            'paginator' => $tasks,
        ])->with('i', (request()->input('page', 1) - 1) * 5);
    }



    public function create(){
        return view('tasks.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $task = new Task;
        $task->name = $request->input('name');
        $task->description = $request->input('description');

        $task->save();

        return redirect()->route('Tasks.index')->with('success', 'La tâche a été ajoutée avec succès');
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $task->name = $request->input('name');
        $task->description = $request->input('description');
        $task->save();

        return redirect()->route('Tasks.index')->with('success', 'La tâche a été modifiée');
    }

    public function destroy($id){
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect('Tasks')->with('success' , 'Tâche supprimée!');
    }

}
