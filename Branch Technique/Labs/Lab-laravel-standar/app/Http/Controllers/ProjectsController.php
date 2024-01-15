<?php

namespace App\Http\Controllers;
use App\Repository\ProjectRepository;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    protected $projectRepository;

    public function __construct(ProjectRepository $projectRepository)
    {
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
            $projects = $this->projectRepository->searchProjects($searchQuery);
    
            return view('projects.search', compact('projects'))->render();
        }
    
        $projects = $this->projectRepository->getAll();
        return view('projects.index', compact('projects'));
    }
    

    public function show($project)
    {
        $project = $this->projectRepository->find($project);

        return view('projects.show', compact('project'));
    }
}
