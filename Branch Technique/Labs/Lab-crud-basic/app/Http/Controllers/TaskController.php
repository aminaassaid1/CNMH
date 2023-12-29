<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Project;
use App\Http\Requests\FormTaskRequest;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index(Request $request)
     {

         $Projects = Project::all();


         if ($request->ajax()) {
             $query = Task::query();
             $search = $request->get('searchTaskValue');
             // $Filter = $request->get('selectProjrctValue');
             $search = str_replace(' ', '%', $search);

             // if ($search && $Filter !== 'Filtrer par projet') {
             //     $query->where('name', 'like', '%' . $search . '%')->where('project_id', $Filter)->paginate(3);
             // }

             if (empty($search)) {
                 $Tasks = Task::with('project')->paginate(4);
                 return view('Tasks.Search', compact('Tasks', 'Projects'));
             }
             if ($search) {
                 $Tasks = $query->with('project')->where('name', 'like', '%' . $search . '%')->paginate(4);
             }
             return view('Tasks.Search', compact('Tasks', 'Projects'))->render();

         }

         $Tasks = Task::with('project')->paginate(4);
         return view('Tasks.index', compact('Tasks', 'Projects'));


     }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Projects = Project::all();
        return view('Tasks.create', compact('Projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FormTaskRequest $request)
    {
        // dd($request->validated());
        Task::create($request->validated());
        return redirect('/')->with('success', 'Tâche créée avec succès !');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $Projects = Project::all();
        return  view('Tasks.edit ' , compact('Projects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
