@extends('layouts.app')

@section('title', 'Portafolio')

@section('content')
    <x-Navbar/>
    <header class="title-bg title">
        <p class="text-center" style="font-size: 45px;">Portfolio</p>
    </header>
    <div class="container mt-5">
        @foreach (array_chunk($projects->get()->all(), 3) as $projectChunk)
            <div class="row">
                @foreach ($projectChunk as $project)
                <div class="project-image-container col-md-4 p-2" onclick="window.location.href = '{{ route('projects.show', $project) }}'" style="cursor: pointer">
                    <img
                        src="{{ asset('img/cocina_1_cedro_montania.jpg') }}"
                        alt="{{ $project->name }}"
                        class="project-image"
                    />
                    <div class="project-overlay absolute" onclick="window.location.href = '{{ route('projects.show', $project) }}'">
                        <p class="project-name">{{ $project->name }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        @endforeach
        <!-- Opción de ver más imágenes -->
        {{-- <div class="ver-mas columna">
            <button class="btn btn-primary">Ver Más Imágenes</button>
        </div> --}}
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

    @if ($errors->any())
    <script type="module">
        $('#modalProject').modal('show');
    </script>
    @endif
@endsection