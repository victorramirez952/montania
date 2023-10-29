<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // Pagina principal
    public function index(){
        // $cursos = Curso::orderBy('id', 'desc')->paginate();
        $services = Service::orderBy('id', 'desc')->paginate();
        $providers = Provider::orderBy('id', 'desc')->paginate();
        return view('services.index', compact('services', 'providers'));
    }

    // Mostrar un curso en particular
    public function show(Service $service){
        return view('services.show', compact('service'));
    }
}
