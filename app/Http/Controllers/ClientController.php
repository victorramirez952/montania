<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    // Pagina principal
    public function index(){
        // $cursos = Curso::orderBy('id', 'desc')->paginate();
        $clients = Client::orderBy('id', 'desc')->paginate();
        return view('clients.index', compact('clients'));
    }

    // Mostrar un curso en particular
    public function show(Client $client){
        return view('clients.show', compact('client'));
    }
}
