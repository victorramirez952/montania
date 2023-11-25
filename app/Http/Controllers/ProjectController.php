<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // Pagina principal
    public function index(){
        // $cursos = Curso::orderBy('id', 'desc')->paginate();
        $projects = Project::orderBy('id_project', 'asc');
        return view('projects.index', compact('projects'));
    }

    // Mostrar un curso en particular
    public function show(Project $project){
        $reviews = $project->reviews()->get();
        return view('projects.show', compact('project', 'reviews'));
    }

    public function store(ProjectRequest $request){
        $project = Project::create($request->all());
        return redirect()->route('projects.show', $project);
    }

    public function update(ProjectRequest $request, Project $project){
        $project->update($request->all());
        return redirect()->route('projects.show', $project);
    }

    public function destroy(Project $project){
        $project->delete();
        return redirect()->route('projects.index');
    }
}
