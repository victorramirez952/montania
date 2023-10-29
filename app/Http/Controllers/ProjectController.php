<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // Pagina principal
    public function index(){
        // $cursos = Curso::orderBy('id', 'desc')->paginate();
        $projects = Project::orderBy('id', 'desc')->paginate();
        return view('projects.index', compact('projects'));
    }

    // Mostrar un curso en particular
    public function show(Project $project){
        return view('projects.show', compact('project'));
    }
}
