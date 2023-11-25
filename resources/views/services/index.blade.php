@extends('layouts.app')

@section('title', 'Servicios')

@section('content')
    <x-ModalService :service="$service ?? null"/>
    <x-Navbar/>
    <!-- Header Servicios -->
    <header class="title-bg title">
        <p class="text-center" style="font-size: 45px;">Services</p>
    </header>
    <!-- Menu de Servicios -->
    <div class="servicesMenu w-100">
        <button type="button" class="btn btn-primary pmd-btn-icon pmd-ripple-effect" data-toggle="modal" data-target="#modalService">
            <i class="fa-solid fa-plus text-white"></i> Add service
        </button>
        <div class="servicesView w-100">
            <div class="row w-100">
                @foreach ($services as $service)
                    <div class="col-md-4 py-2">
                        <x-Service :service="$service"/>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    
  <br>
  <br>
  <!-- Sección de "Proveedores" -->
  <div class="ourSuppliers">
    <h1 style="font-size: 36px; margin-bottom: 20px;">Suppliers</h1>
    <p style="font-size: 18px; text-align: justify; margin-left: 10%; margin-right: 10%;">"At Montania, we collaborate with a select network of specialized suppliers in coverings, designer furniture, and technological solutions to provide our clients with the highest quality in every project. Trust our experts and our trusted associates to create truly exceptional spaces."</p>
    <div class="viewSuppliers w-100">
        <div class="row w-100">
            @foreach ($categories_providers as $supplier)
                <div class="col-md-4 py-4">
                    <x-CategoryProvider :supplier="$supplier"/>
                </div>
            @endforeach
        </div>
    </div>
  </div>

  <br>
  <br>
  <!-- Sección "¿Te gustaría ser proveedor?" -->
  <div class="fondoProv d-flex justify-content-center p-0">
    <div class="h-full container-fluid d-flex flex-column align-items-center justify-content-around">
      <p>Would you like to join our team of suppliers?</p>
      <a href="{{ route('contact') }}"><button type="submit" class="contactGenProcess"> Contact us</button></a>
    </div>
  </div>

  <br>
  <br>
  <x-WhatsAppButton/>
  <x-Footer/>
  
  @if ($errors->any())
    <script type="module">
        $('#modalService').modal('show');
    </script>
    @endif
@endsection