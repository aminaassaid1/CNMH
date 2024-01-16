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

        if ($request->ajax()) {
            $searchQuery = $request->get('searchValue');
            $searchQuery = str_replace(' ', '%', $searchQuery);
            $Projects = $this->projectRepository->searchProjects($searchQuery);
          
            return view('Projects.projectSearch', compact('Projects'));
        }

        return view('Projects.index' , compact('Projects'));
    }


    
   
    public function show($project)
    {
        $project = $this->projectRepository->find($project);

        return view('Projects.show', compact('project'));
    }

}
