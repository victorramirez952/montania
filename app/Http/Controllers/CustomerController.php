<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
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

    public function show(Customer $customer, Request $request){
        $selectedProjectId = $request->input('default_project', session('id_default_project', 1));
        session(['id_default_project' => $selectedProjectId]);
    
        $projects = $customer->projects()->get();
        $defaultProject = Project::find($selectedProjectId);
        $stages = $defaultProject->stages()->orderBy('date', 'desc')->get();
        return view('customers.show', compact('customer', 'projects', 'defaultProject', 'stages'));
    }

    public function resources(Customer $customer, Project $defaultProject){
        $projects = $customer->projects()->get();
        $resources = $defaultProject->resources()->get();
        return view('customers.resources', compact('customer', 'resources', 'projects', 'defaultProject'));
    }

    public function update(CustomerRequest $request, $id_user){
        $user = User::find($id_user);
        $user->update($request->only([
            'email',
            'first_names',
            'last_names',
            'avatar_image',
        ]));
        $user->customer()->update(
            $request->only([
                'phone',
                'address',
                'second_email',
            ])
        );
        $customer = Customer::find($user->customer->id_customer);
        return redirect()->route('customers.show', $customer);
    }
}
