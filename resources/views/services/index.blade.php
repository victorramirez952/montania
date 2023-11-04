@extends('layouts.app')

@section('title', 'Servicios')

@section('content')
    <x-Navbar/>
    <!-- Header Servicios -->
    <header class="title-bg title">
        <p class="text-center" style="font-size: 45px;">Services</p>
    </header>

    @php
$services = [
    [
        'src' => 'img/icono-design-visit.png',
        'title' => 'Design visit',
        'subtitle' => 'Starting at $1,500'
    ],
    [
        'src' => 'img/icono-design-coaching.png',
        'title' => 'Design coaching',
        'subtitle' => 'Starting at $2,990'
    ],
    [
        'src' => 'img/icono-design-project.png',
        'title' => 'Design project',
        'subtitle' => 'Starting at $150 x M2'
    ],
    [
        'src' => 'img/icono-personal-shopper.png',
        'title' => 'Personal Shopper',
        'subtitle' => 'Starting at $2,350'
    ],
    [
        'src' => 'img/icono-real-state-consulting.png',
        'title' => 'Real State Consulting',
        'subtitle' => 'Starting at $750'
    ]
];
@endphp
    <!-- Menu de Servicios -->
  <div class="servicesMenu">
    <div class="servicesView">
        @foreach ($services as $service)
            <x-Service :service="$service"/>
        @endforeach
    </div>
  </div>

  <br>
  <br>
  @php
$suppliers = [
    [
        'src' => 'img/icono-contratistas.png',
        'title' => 'Contratistas',
    ],
    [
        'src' => 'img/icono-carpinteros.png',
        'title' => 'Carpinteros',
    ],
    [
        'src' => 'img/icono-tapiceros.png',
        'title' => 'Tapiceros',
    ],
    [
        'src' => 'img/icono-herreros.png',
        'title' => 'Herreros',
    ],
];
@endphp
  <!-- Sección de "Proveedores" -->
  <div class="ourSuppliers">
    <h1 style="font-size: 36px; margin-bottom: 20px;">Suppliers</h1>
    <p style="font-size: 18px; text-align: justify; margin-left: 10%; margin-right: 10%;">"At Montania, we collaborate with a select network of specialized suppliers in coverings, designer furniture, and technological solutions to provide our clients with the highest quality in every project. Trust our experts and our trusted associates to create truly exceptional spaces."</p>
    <div class="viewSuppliers">
        @foreach ($suppliers as $supplier)
            <x-CategoryProvider :supplier="$supplier"/>
        @endforeach
    </div>
  </div>

  <br>
  <br>
  <!-- Sección "¿Te gustaría ser proveedor?" -->
  <div class="fondoProv d-flex justify-content-center p-0">
    <div class="h-full container-fluid d-flex flex-column justify-content-around">
      <p>Would you like to join our team of suppliers?</p>
      <a href="{{ route('contact') }}"><button type="submit" class="contactGenProcess"> Contact us</button></a>
    </div>
  </div>

  <br>
  <br>
  <x-WhatsAppButton/>
  <x-Footer/>
@endsection
