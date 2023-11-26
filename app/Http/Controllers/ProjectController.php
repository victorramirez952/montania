<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Customer;
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
        // Create a new project
        $project = Project::create($request->except('id_customer'));
    
        // Attach the project to the customer
        $customer = Customer::find($request->input('id_customer'));
        $customer->projects()->attach($project);
    
        return back()->with('success', 'Project created successfully!');
    }    

    public function update(ProjectRequest $request, Project $project){
        $project->update($request->all());
        return back()->with('success', 'Project edited successfully!');
    }

    public function destroy(Project $project){
        $project->delete();
        return redirect()->route('projects.index');
    }
}
