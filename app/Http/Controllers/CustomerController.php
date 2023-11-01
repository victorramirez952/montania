<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // Pagina principal
    public function index(){
        // $cursos = Curso::orderBy('id', 'desc')->paginate();
        $customers = Customer::orderBy('email', 'asc')->paginate();
        return view('customers.index', compact('customers'));
    }

    // Mostrar un curso en particular
    public function show(Customer $customer){
        return view('customers.show', compact('customer'));
    }

    // Mostrar un curso en particular
    public function resources(Customer $customer){
        return view('customers.resources', compact('customer'));
    }
}
