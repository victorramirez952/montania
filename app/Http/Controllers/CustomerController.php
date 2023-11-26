<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // Pagina principal
    public function index(){
        // $cursos = Curso::orderBy('id', 'desc')->paginate();
        // $customers = User::orderBy('id_user', 'asc')->paginate();
        $customers = Customer::with('user')->get();
        return view('customers.index', compact('customers'));
    }

    // Mostrar un curso en particular
    public function show(Customer $customer, Request $request){
        $selectedProjectId = $request->input('default_project', session('id_default_project', 1));
        session(['id_default_project' => $selectedProjectId]);
    
        $projects = $customer->projects()->get();
        $defaultProject = Project::find($selectedProjectId);
        $stages = $defaultProject->stages()->orderBy('date', 'desc')->get();
        return view('customers.show', compact('customer', 'projects', 'defaultProject', 'stages'));
    }

    // Mostrar un curso en particular
    public function resources(Customer $customer, Project $defaultProject){
        $projects = $customer->projects()->get();
        $resources = $defaultProject->resources()->get();
        return view('customers.resources', compact('customer', 'resources', 'projects', 'defaultProject'));
    }
}
