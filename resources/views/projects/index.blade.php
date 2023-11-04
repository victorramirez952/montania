@extends('layouts.app')

@section('title', 'Portafolio')

@section('content')
    <x-Navbar/>
    <header class="title-bg title">
        <p class="text-center" style="font-size: 45px;">Portfolio</p>
    </header>
    <div class="navegador-dos-columnas">
        <div class="navegador-dos-columnas navegador-w">
          <div>
              <a href="#">Residenciales</a>
          </div>
          <div>
              <a href="#">Comerciales</a>
          </div>
        </div>
    </div>
    <div class="container mt-5">
        @for ($i = 0; $i < count($projects); $i += 3)
        <div class="row">
            @for ($j = $i; $j < $i + 3 && $j < count($projects); $j++)
            <!-- Primera columna -->
            <div class="col-md-4">
                <img src="{{ asset('img/cocina_1_cedro_montania.jpg') }}" alt="Imagen {{ $j + 1 }}" class="imagen columna">
            </div>
            @endfor
        </div>
        @endfor
        <!-- Opción de ver más imágenes -->
        <div class="ver-mas columna">
            <button class="btn btn-primary">Ver Más Imágenes</button>
        </div>
    </div>
    {{-- <ul>
        @foreach ($projects as $project)
            <li>
                <a href="{{route('projects.show', $project->id_project)}}">{{$project->name}}</a>
            </li>
        @endforeach
    </ul> --}}
    <x-WhatsAppButton/>
    <x-Footer/>
@endsection