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
        <div class="viewMainServices">
            <div class="serviceSpace" style="margin-right: 10%;">
                <p style="font-weight: bold; text-align: start; font-size: 16px;">Design Coaching</p>
                <p style="text-align: start; font-size: 22px;">$4,999.00 MXN</p>
                <p style="font-size: 14px; text-align: justify;">Our Design Coaching service at Montania is a unique
                    opportunity
                    for those who seek a more interactive
                    approach to transforming their spaces.</p>
                <div>
                    <img src="{{ asset('img/Modelo-SalaComedor-1.svg') }}">
                </div>
                <p style="text-align: start; font-size: 14px;"><a href="#" style="color: black;">Learn more...</a></p>
                <button type="submit" class="solicitarServicio">Get Design Coaching</button>
            </div>
            <div class="serviceSpace" style="margin-left: 10%;">
                <p style="font-weight: bold; text-align: start; font-size: 16px;">Design Project</p>
                <p style="text-align: start; font-size: 22px;">$4,999.00 MXN</p>
                <p style="font-size: 14px; text-align: justify;">Our Design Project service at Montania is the answer to the
                    quest for comprehensive solutions in interior design and architecture. We turn your ideas into inspiring
                    and
                    functional projects.</p>
                <div>
                    <img src="{{ asset('img/Modelo-SalaComedor-1.svg') }}">
                </div>
                <p style="text-align: start; font-size: 14px;"><a href="#" style="color: black;">Learn more...</a></p>
                <button type="submit" class="solicitarServicio">Get Design Project</button>
            </div>
        </div>
    </div>

    <br>
    <br>

    <!-- Sección "Nuestros proyectos" -->
    <section class="ourProyects">
        <h1>Some of our proyects</h1>
        <div class="smallProyectCatalogue">
            <img src="{{ asset('img/Modelo-SalaComedor-1.svg') }}">
            <img src="{{ asset('img/Modelo-SalaComedor-1.svg') }}">
            <img src="{{ asset('img/Modelo-SalaComedor-1.svg') }}">
            <img src="{{ asset('img/Modelo-SalaComedor-1.svg') }}">
            <img src="{{ asset('img/Modelo-SalaComedor-1.svg') }}">
        </div>
        <div class="smallProyectCatalogue">
            <img src="{{ asset('img/Modelo-SalaComedor-1.svg') }}">
            <img src="{{ asset('img/Modelo-SalaComedor-1.svg') }}">
            <img src="{{ asset('img/Modelo-SalaComedor-1.svg') }}">
            <img src="{{ asset('img/Modelo-SalaComedor-1.svg') }}">
            <img src="{{ asset('img/Modelo-SalaComedor-1.svg') }}">
        </div>
        <a href="{{ route('projects.index') }}"><button type="submit" class="aboutUs">Full protfolio</button></a>
    </section>

    <br>
    <br>
    <!-- Sección "Lo que opinan nuestros clientes" -->
    <div class="someReviews">
        <h1>Reviews of our clients</h1>
        <div class="viewReviews">
            <div class="clientReview">
                <div>
                    <img src="{{ asset('img/profileClient.png') }}">
                    <div>
                        <p style="margin-bottom: 0.5px;">Jhon Doe</p>
                        <p>Cliente Montania</p>
                    </div>
                </div>
                <p>University road forgive honor examine hard businesslike east speech ship size rare people speech suck
                    settle
                    build calm anger grave fate noon else after tonight interest outline quality maybe harvest</p>
            </div>
            <div class="clientReview">
                <div>
                    <img src="{{ asset('img/profileClient.png') }}">
                    <div>
                        <p style="margin-bottom: 0.5px;">Jhon Doe</p>
                        <p>Cliente Montania</p>
                    </div>
                </div>
                <p>University road forgive honor examine hard businesslike east speech ship size rare people speech suck
                    settle
                    build calm anger grave fate noon else after tonight interest outline quality maybe harvest</p>
            </div>
            <div class="clientReview">
                <div>
                    <img src="{{ asset('img/profileClient.png') }}">
                    <div>
                        <p style="margin-bottom: 0.5px;">Jhon Doe</p>
                        <p>Cliente Montania</p>
                    </div>
                </div>
                <p>University road forgive honor examine hard businesslike east speech ship size rare people speech suck
                    settle
                    build calm anger grave fate noon else after tonight interest outline quality maybe harvest</p>
            </div>
        </div>
    </div>

    <br>
    <br>
    <x-WhatsAppButton/>
    <x-Footer/>
@endsection
