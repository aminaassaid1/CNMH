<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProjectsRepository;


class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     protected $projectRepository;
    
     public function __construct(ProjectsRepository $projectRepository){
         $this->projectRepository = $projectRepository;
     }
    
     public function index(Request $request){
        $Projects = $this->projectRepository->index();

        if($request->ajax()){
            $seachQuery = $request->get('searchValue');
            $seachQuery = str_replace(' ','%', $seachQuery);
            $projects = $this->projectRepository->searchProjects($seachQuery);

            return view('projects.search' , compact('projects'))->render();
        }

        return view('Projects.index' , compact('Projects'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $projects = $this->projectRepository->find($id);
         
        
        $id = $projects->id;
        dd($id);

        return view('Projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
