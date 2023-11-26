<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerCreateRequest;
use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        
        // Find the default project by id or get the first project if it doesn't exist
        $defaultProject = Project::find($selectedProjectId) ?? $customer->projects->first();
    
        if ($defaultProject) {
            // The project is found
            $stages = $defaultProject->stages()->orderBy('date', 'desc')->get();
            return view('customers.show', compact('customer', 'projects', 'defaultProject', 'stages'));
        } else {
            // No projects available
            return view('customers.show', compact('customer', 'projects'));
        }
    }

    public function resources(Customer $customer, Project $defaultProject){
        $projects = $customer->projects()->get();
        $resources = $defaultProject->resources()->get();
        return view('customers.resources', compact('customer', 'resources', 'projects', 'defaultProject'));
    }

    public function store(CustomerCreateRequest $request){
        $user = User::create([
            'email' => $request->input('email'),
            'first_names' => $request->input('first_names'),
            'last_names' => $request->input('last_names'),
            'avatar_image' => $request->input('avatar_image'),
            'password' => Hash::make($request->input('password')), // Adjust this based on your password field name
        ]);
    
        // Create a new customer instance and associate it with the user
        $customer = $user->customer()->create([
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'second_email' => $request->input('second_email'),
        ]);
    
        return redirect()->route('customers.index');
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

    public function resetDefaultProject(Customer $customer){
        $firstProject = $customer->projects->first();
    
        // Check if there is at least one project
        if ($firstProject) {
            // Reset the default project to the first project of the customer
            session(['id_default_project' => $firstProject->id_project]);
        } else {
            // If no projects, set the default project to null or any default value you prefer
            session(['id_default_project' => null]);
        }
    
        // Redirect back to the customer show route
        return redirect()->route('customers.show', $customer);
    }

    public function destroy(Customer $customer){
        $customer->user->delete();
        return redirect()->route('customers.index');
    }

}
