<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProjectsRepository;

class ProjectsController extends Controller
{
    protected $projectRepository ;
    public function __construct(ProjectsRepository $projectRepository){
        $this->projectRepository = $projectRepository;

    }
    public function index(){
        $projects = $this->projectRepository->index();
        return view('Projects.index' , compact('projects'));


    }
}
