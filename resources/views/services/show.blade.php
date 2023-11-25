@extends('layouts.app')

@section('title', 'Servicios ' . $service->name)

@section('content')
    <x-ModalService :service="$service"/>
    <x-ModalDeliverable :service="$service" :deliverable="$deliverable ?? null"/>
    <x-Navbar/>
    <!-- Header Servicio "Design Coaching" -->
    <header class="title-bg title">
        <p class="text-center" style="font-size: 45px;">{{ $service->name }}</p>
    </header>

    <!-- Sección "Detalles" -->
    <div class="serviceDetails">
      <button type="button" class="btn btn-primary pmd-btn-icon pmd-ripple-effect" data-toggle="modal" data-target="#modalService">
        <i class="fa-solid fa-pen-to-square text-white"></i> Edit service
      </button>
    </div>
  <div class="serviceDetails">
    <div class="detailsContent">
      <div class="detail">
        <div>
          <img src="{{ asset('img/icono-duracion.png') }}">
          <p>Duration:</p>
        </div>
        <div style="border: 1px solid #223326; margin-left: 40px;">
          <p>{{ $service->duration }} {{ $service->time_units }}</p>
        </div>
      </div>
      <div class="detail">
        <div>
          <img src="../img/icono-numero-sesiones.png">
          <p>Sessions:</p>
        </div>
        <div style="border: 1px solid #223326; margin-left: 40px;">
          <p>{{ $service->sessions_number }} sessions</p>
        </div>
      </div>
      @foreach ($service->prices as $price)
        <div class="detail">
          <div>
            <img src="{{ asset('img/icono-costo.png') }}">
            <p>{{ $price->description }}:</p>
          </div>
          <div style="border: 1px solid #223326; margin-left: 40px;">
            <p>${{ $price->price }} @if ($price->m2)
                x m2
            @endif</p>
          </div>
        </div>
      @endforeach
  </div>
    <div class="detailsContent">
      <img src="../img/patio-con-piscina.png">
    </div>
  </div>
  <div class="detailsButtons">
    <a href="https://calendly.com/montania-mx"><button type="submit" class="contactService">Schedule appointment</button></a>
    <a href="{{ route('contact') }}"><button type="submit" class="contactService">Contact us</button></a>
  </div>

  <br>
  <br>
  <div class="servicesMenu">
    <!-- Sección "¿Qué incluye?" -->
    <h1 style="font-size: 36px; margin-bottom: 40px; margin-top: 10px;">What does it include?</h1>
    <button type="button" class="btn btn-primary pmd-btn-icon pmd-ripple-effect mb-4" data-toggle="modal" data-target="#modalDeliverable">
      <i class="fa-solid fa-plus text-white"></i> Add deliverable
    </button>
    <table>
      <tr>
        @foreach ($service->deliverables as $deliverable)
          <td>
            <button type="button" class="btn btn-primary pmd-btn-icon pmd-ripple-effect mb-4" data-toggle="modal" data-target="#modalDeliverable">
              <i class="fa-solid fa-pen-to-square text-white"></i> Edit deliverable
            </button>
            <p style="font-weight: bold;">{{ $deliverable->title }}</p>
            <ol class="lista">
                <li>{{ $deliverable->description }}</li>
                {{-- <li>Style and inspiration moodboard.</li>
                <li>Palette of colors, textures and materials.</li>
                <li>Elevations of walls and furniture on design.</li>
                <li>Shopping list - style, color, material and dimensions.</li> --}}
            </ol>
          </td>
        @endforeach
      </tr>
    </table>
  </div>

  <br>
  <br>
  <!-- Sección de "Reviews" -->
  <div class="someReviews">
    <h1 style="text-align: center; font-size: 36px;">Reviews</h1>
    <div class="espServiceReviews">
      @foreach ($service->reviews as $review)
        <div class="reviewEspService">
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
  </div>

  <br>
  <br>
  <br>
  <!-- Sección de "Colaboradores" -->
  <h1 style="font-size: 36px; text-align: center;">Collaborators</h1>
  <div class="secCollabs">
    <div class="carruselCollabs">
      @foreach ($service->collaborators as $collaborator)
        <div class="container mt-3">
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
          <div style="width: 100%; display: flex; margin-top: 10px;">
            <img src="{{ asset('img/profileClient.png') }}" style="width: 50px; height: 50px; margin-right: 7px;">
            <div>
              <p style="margin-bottom: 0.5px;">{{ $collaborator->first_names }} {{ $collaborator->last_names }}</p>
              <p>{{ $collaborator->profession }}</p>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>

  <x-WhatsAppButton/>
  <x-Footer/>

  @if ($errors->any())
  <script type="module">
      $('#modalDeliverable').modal('show');
  </script>
  @endif
@endsection
