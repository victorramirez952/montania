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
    public function show(Customer $customer){
        return view('customers.show', compact('customer'));
    }

    // Mostrar un curso en particular
    public function resources(Customer $customer){
        $projects = $customer->projects()->get();
        return view('customers.resources', compact('customer', 'projects'));
    }
}
