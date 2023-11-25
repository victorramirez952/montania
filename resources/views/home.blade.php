@extends('layouts.app')

@section('content')
    {{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @can('publicHome')
                        <h3>Welcome to the <b>Admin</b> Dashboard</h3>
                    @endcan
                    @cannot('publicHome')
                        <h3>Welcome to the User Dashboard</h3>
                    @endcannot
                </div>
                @auth
                    <p>Welcome, {{ Auth::user() }}</p>
                @else
                    <p>User not authenticated</p>
                @endauth
            </div>
        </div>
    </div>
</div> --}}
    <x-Navbar />
    <x-Banner />
    <br>
    <br>
    <!--Sección "¿Quiénes somos?" -->
    <section class="aboutContent">
        <div class="aboutImage">
            <img src="{{ asset('img/Modelo-SalaComedor-1.svg') }}" alt="Imagen">
        </div>
        <div class="aboutText">
            <h1>Who are we?</h1>
            <p>Montania is an architecture and interior design firm born from a passion for transforming spaces into
                exceptional experiences. With over a decade of experience, we have evolved with each project, blending
                creativity, functionality, and aesthetics to create unique homes and commercial spaces. Our dedication to
                excellence and innovative vision drive us to push the boundaries of design, always seeking perfection in
                every
                detail.</p>
            <button type="button" onclick="window.location.href = '{{ route('about') }}'" class="aboutUs">About us</button>
        </div>
    </section>

    <br>
    <br>
    <!-- Proceso General Montania -->
    <div class="genProcess">
        <h1>Get to know our process</h1>
        <div class=visualProcess>
            <img src="{{ asset('img/Vector-Introduccion.png') }}">
            <img src="{{ asset('img/Vector-Propuesta.png') }}">
            <img src="{{ asset('img/Vector-Diseño.png') }}">
            <img src="{{ asset('img/Vector-Presupuesto.png') }}">
            <img src="{{ asset('img/Vector-Ejecucion.png') }}">
            <img src="{{ asset('img/Vector-Delivery.png') }}">
            <div class="circulo">
                <span class="numero">1</span>
            </div>
            <div class="circulo">
                <span class="numero">2</span>
            </div>
            <div class="circulo">
                <span class="numero">3</span>
            </div>
            <div class="circulo">
                <span class="numero">4</span>
            </div>
            <div class="circulo">
                <span class="numero">5</span>
            </div>
            <div class="circulo">
                <span class="numero">6</span>
            </div>
            <p>Introduction</p>
            <p>Economic Proposal</p>
            <p>Design</p>
            <p>Budget</p>
            <p>Execution</p>
            <p>Delivery</p>
        </div>
        <a href="{{ route('contact') }}"><button type="submit" class="contactGenProcess"> Contact us</button></a>
    </div>

    <br>
    <br>
    <!--Sección "¿Qué hacemos?" -->
    <section class="aboutContent">
        <div class="whatWeDoText">
            <h1>What do we do?</h1>
            <p>At Montania, our focus is to transform dreams into visual and functional realities. As an architecture and
                interior design firm, we offer a wide range of services that span from space conceptualization to final
                execution. Our talented team of architects and designers collaborates closely with each client to create
                unique
                and customized environments that reflect their tastes, needs, and vision. Whether it's a cozy home, an
                innovative commercial space, or a stunning renovation, Montania is committed to bringing your projects to
                life
                with creativity, quality, and a passion for exceptional design.</p>
            <a href="{{ route('services.index') }}"><button type="submit" class="aboutUs">Services</button></a>
        </div>
        <div class="whatWeDoImage">
            <img src="{{ asset('img/Modelo-SalaComedor-1.svg') }}" alt="Imagen">
        </div>
    </section>

    <br>
    <br>
    <!-- Sección "Principales Servicios" -->
    <div class="mainServices">
        <h1>Our main services</h1>
        <div class="viewMainServices d-flex justify-content-around align-items-center align-items-stretch">
            @foreach ($services as $service)
                <div class="serviceSpace d-flex flex-column justify-content-between" style="height: inherit;">
                    <p style="font-weight: bold; text-align: start; font-size: 16px;">{{ $service->name }}</p>
                    <p style="text-align: start; font-size: 22px;">
                        @if ($price = $service->prices->where('price_cover', true)->first())
                            {{ $price->price }} MXN
                        @else
                            No price available
                        @endif
                    </p>                    
                    <p style="font-size: 14px; text-align: justify;">
                        {{ $service->description }}
                    </p>
                    <div>
                        <img src="{{ asset('img/Modelo-SalaComedor-1.svg') }}">
                    </div>
                    <p style="text-align: start; font-size: 14px;"><a href="#" style="color: black;">Learn more...</a></p>
                    <button type="submit" class="solicitarServicio" onclick="window.location.href = '{{ route('services.show', $service) }}'">Get {{ $service->name }}</button>
                </div>
            @endforeach
        </div>
    </div>

    <br>
    <br>

    <!-- Sección "Nuestros proyectos" -->
    <section class="ourProyects">
        <h1>Some of our proyects</h1>
        @php $projectsPerRow = 5; @endphp

        @foreach ($projects->chunk($projectsPerRow) as $row)
            <div class="smallProjectCatalogue w-100 mt-2 d-flex justify-content-around">
                @foreach ($row as $project)
                <div class="project-image-container col-2 p-0">
                    <img
                        src="{{ asset("img/Modelo-SalaComedor-1.svg") }}"
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
        <a href="{{ route('projects.index') }}"><button type="submit" class="aboutUs mt-4">Full protfolio</button></a>
    </section>

    <br>
    <br>
    <!-- Sección "Lo que opinan nuestros clientes" -->
    <div class="someReviews">
        <h1>Reviews of our clients</h1>
        <div class="viewReviews d-flex justify-content-center">
            @foreach ($services as $service)
                @foreach ($service->reviews as $review)
                    <div class="clientReview">
                        <div>
                            <img src="{{ asset('img/profileClient.png') }}">
                            <div>
                                <p style="margin-bottom: 0.5px;">{{ $review->customer->user->first_names }} {{ $review->customer->user->last_names }}</p>
                                <p>Montania's customer</p>
                            </div>
                        </div>
                        <p>
                            {{ $review->text }}
                        </p>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>

    <br>
    <br>
    <x-WhatsAppButton/>
    <x-Footer/>
@endsection
