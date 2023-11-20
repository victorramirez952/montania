@extends('layouts.app')

@section('title', 'Sobre Montania')

@section('content')
    <x-Navbar/>
    <div class="banner">
        <div
          style="width: 60%; margin-left: 20%; margin-right: 20%; background-color: rgba(217, 217, 217, 0.3); height: 100vh;">
          <div style="width: 60%; margin-left: 20%; margin-right: 20%; height: 70vh;">
            <img src="{{ asset('img/Logo-Negro.png') }}" class="logo">
          </div>
          <div style="width: 60%; margin-left: 20%; margin-right: 20%; height: 30vh;">
            <p style="font-weight: bold; font-size: 24px; text-align: center;">Where your spaces come to life and your
              dreams become architectural reality.</p>
          </div>
        </div>
    </div>
    <br>
    <br>
    <div class="fondoHistoria">
        <div class="espServiceReviews">
          <div style="width: 50%; padding: 15px;">
            <h1 style="font-size: 36px; font-weight: bold;">History</h1>
            <p style="font-size: 15px;">Montania, an architecture and interior design company based in Monterrey, Nuevo
              León, was born from the vision of two friends passionate about transforming spaces in 2005. Over the years, we
              have evolved, fusing the cultural richness of Monterrey into our designs, creating unique homes and commercial
              spaces. Our firm has grown, but our passion for design remains the same.</p>
            <div style="width: 60%; margin-top: 20px;">
              <img src="{{ asset('img/fachda-nocturna.png') }}" style="max-width: 100%; height: auto;">
            </div>
          </div>
          <div style="width: 50%; font-size: 15px; padding: 15px;">
            <h1 style="font-size: 36px; font-weight: bold;">Fundations</h1>
            <ul style="padding-left: 20px;">
              <li>Lorem ipsum</li>
              <p>Describe headdress various preserve wire page weight perfect delivery gift half reference village connect
                cowardice </p>
              <li>Lorem ipsum</li>
              <p>Describe headdress various preserve wire page weight perfect delivery gift half reference village connect
                cowardice </p>
              <li>Lorem ipsum</li>
              <p>Describe headdress various preserve wire page weight perfect delivery gift half reference village connect
                cowardice </p>
              <li>Lorem ipsum</li>
              <p>Describe headdress various preserve wire page weight perfect delivery gift half reference village connect
                cowardice </p>
            </ul>
          </div>
        </div>
    </div>
    <br>
    <br>
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
    <!--Sección "Misión" -->
    <section class="aboutContent">
      <div class="whatWeDoText">
        <h1>Mission</h1>
        <p style="text-align: center;">At Montania, our mission is to create exceptional spaces that inspire and improve
          the quality of life of our clients.</p>
      </div>
      <div class="whatWeDoImage">
        <img src="{{ asset('img/TERRAZA-CEDRO-MONTANIA.jpg') }}" alt="Imagen" style="max-height: 300px;">
      </div>
    </section>
    <br>
    <br>
    <!--Sección "Visión" -->
    <section class="aboutContent">
      <div class="whatWeDoImage" style="margin-right: 0; margin-left: 10%;">
        <img src="{{ asset('img/TERRAZA-CEDRO-MONTANIA.jpg') }}" alt="Imagen" style="max-height: 300px;">
      </div>
      <div class="whatWeDoText" style="margin-left: 20px;">
        <h1>Vision</h1>
        <p style="text-align: center;">Our vision at Montania is to lead the industry, setting trends in design and
          improving the world through architectural art.</p>
      </div>
    </section>
    <x-WhatsAppButton/>
    <x-Footer/>
@endsection