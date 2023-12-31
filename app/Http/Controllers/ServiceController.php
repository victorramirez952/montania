<?php

namespace App\Http\Controllers;

use App\Models\Categorie_Provider;
use App\Models\Category_Provider;
use App\Models\CategoryProvider;
use App\Models\Provider;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // Pagina principal
    public function index(){
        // $cursos = Curso::orderBy('id', 'desc')->paginate();
        $services = Service::orderBy('id_service', 'asc')->with('prices')->get();
        $categories_providers = CategoryProvider::orderBy('id_category_provider', 'asc')->with('contact')->get();
        return view('services.index', compact('services', 'categories_providers'));
    }

    // Mostrar un curso en particular
    public function show(Service $service){
        return view('services.show', compact('service'));
    }
}
