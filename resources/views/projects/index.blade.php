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
        @foreach (array_chunk($projects->get()->all(), 3) as $projectChunk)
            <div class="row">
                @foreach ($projectChunk as $project)
                    <div class="col-md-4" onclick="window.location.href = '{{ route('projects.show', $project) }}'" style="cursor: pointer">
                        <img src="{{ asset('img/cocina_1_cedro_montania.jpg') }}" alt="Imagen {{ $loop->iteration }}" class="imagen columna">
                    </div>
                @endforeach
            </div>
        @endforeach
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