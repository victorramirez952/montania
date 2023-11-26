@extends('layouts.app')

@section('title', 'Proyecto portafolio ' . $project->name)

@section('content')
    <x-ModalProject :project="$project ?? null"/>
    <x-ModalReview :project="$project ?? null" :review="$review ?? null"/>
    <x-ModalEliminar/>
    <x-Navbar />
    <!-- Header Proyecto Especifico -->
    <header class="title-bg title">
        <p class="text-center" style="font-size: 45px;">{{ $project->name }}</p>
    </header>

    <!-- Descripción Proyecto Especifico -->
    <div class="container my-4">
        <button type="button" class="btn btn-primary pmd-btn-icon pmd-ripple-effect" data-toggle="modal" data-target="#modalProject">
            <i class="fa-solid fa-pen-to-square text-white"></i> Edit project
        </button>
        <button type="button" class="btn btn-primary pmd-btn-icon pmd-ripple-effect" data-toggle="modal" data-target="#modalEliminar" onclick="setDeleteForm('{{ route('projects.destroy', $project) }}')">
            <i class="fa-solid fa-trash text-white"></i> Delete project
        </button>
    </div>
    <div class="aboutContent p-5">
        <div class="descProyectos d-flex flex-column flex-sm-row w-100 p-4">
            <div style="margin-right: 20px;" class="w-100 w-sm-25">
                <div style="display: flex;">
                    <img src="{{ asset('img/icono-localización.png') }}" style="height: 20px; width: auto;">
                    <p style="margin-left: 15px;">{{ $project->place }} </p>
                </div>
                <div style="display: flex;">
                    <img src="{{ asset('img/icono-calendario.png') }}" style="height: 20px; width: auto;">
                    <p style="margin-left: 10px;">{{ $project->end_date }}</p>
                </div>
                <div style="display: flex;">
                    <img src="{{ asset('img/icono-tipo.png') }}" style="height: 20px; width: auto;">
                    <p style="margin-left: 10px;">{{ $project->type }}</p>
                </div>
            </div>
            <p style="text-align: justify;" class="w-100 w-sm-75">{{ $project->description }}
            </p>
        </div>
    </div>

    <br>
    <br>
    <!-- Sección Carrusel Proyecto Especifico -->
    <div class="carruselProyecto">
        <div style="width: 60%; margin-left: 20%; margin-right: 20%;">
            <div class="container">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('img/patio-con-piscina.png') }}" class="d-block w-100" alt="Imagen 1">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('img/Nursery-Modelo-3D.jpg') }}" class="d-block w-100" alt="Imagen 2">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('img/patio-piscina-2.png') }}" class="d-block w-100" alt="Imagen 3">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Anterior</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Siguiente</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>
    <!-- Sección Reviews -->
    {{-- <div class="someReviews d-flex flex-column">
        <h1>Reviews</h1>
        <div class="container">
            <button type="button" class="btn btn-primary pmd-btn-icon pmd-ripple-effect" data-toggle="modal" data-target="#modalReview">
                <i class="fa-solid fa-plus text-white"></i> Add review
            </button>
        </div>
        <div class="reviewProyect d-flex p-5 w-75 mx-auto">
            @foreach ($reviews as $review)
                <div class="reviewEspService w-50">
                    <div>
                        <img src="{{ asset('img/profileClient.png') }}">
                        <div>
                            <p style="margin-bottom: 0.5px;">{{ $review->customer->user->first_names }} {{ $review->customer->user->last_names }}</p>
                            <p>Cliente Montania</p>
                        </div>
                    </div>
                    <p>{{ $review->text }}</p>
                </div>
            @endforeach
        </div>
    </div> --}}
    
    <x-WhatsAppButton/>
    <x-Footer/>

    @if ($errors->any())
    <script type="module">
        $('#modalProject').modal('show');
    </script>
    @endif

    <script>
        function setDeleteForm(action) {
            // Set the action attribute and id value for the delete form
            document.getElementById('deleteForm').action = action;
        }
    </script>
@endsection
