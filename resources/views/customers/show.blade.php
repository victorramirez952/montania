@extends('layouts.app')

@section('title', 'Cliente proyectos ' . $customer->id_customer)
@section('body-style', 'background-color: #EBE5D3;')

@section('content')
    {{-- <h1>Bienvenido a la pagina del cliente: {{$customer->user->first_names}}</h1> --}}
    <x-ModalProjectsUser :customer="$customer ?? null" :projects="$projects ?? null" :defaultProject="$defaultProject" />
    <x-Navbar/>
    <!-- Contenido de la pag -->
    <div class="container" style="margin: auto; margin-top: 150px; margin-bottom: 110px;">
        <div class="row">
          <!-- Columna para la imagen -->
          <div class="col-md-4">
            <img src="{{ asset('img/perfil.png') }}" alt="Foto de Perfil" class="img-fluid">
          </div>
          <!-- Columna para el texto -->
          <div class="col-md-8" style="font-size: 20px;">
            <p><strong>Nombre:</strong> {{ $customer->user->first_names }}</p>
            <p><strong>Email:</strong> {{ $customer->user->email }}</p>
            <p><strong>Teléfono:</strong> {{ $customer->phone }}</p>
            <p><strong>Dirección:</strong> {{ $customer->address }}</p>
            @if ($customer->second_email)
                <p><strong>Segundo Email:</strong> {{ $customer->second_email }}</p>
                @endif
            </div>
        </div>
    </div>
    
    <div style="background-color: white; padding: 10px; color: white;"></div>
    
    <h4 class="w-100 py-2 text-center">Dashboard</h4>
    {{-- @if ($defaultProject)
        <h4>Hay defaultProject: {{ $defaultProject->name }}</h4>
    @endif --}}

    <div class="container d-flex align-items-center p-2">
      <p class="text-center p-0 m-0 h-100">{{ $defaultProject->name }}</p>
      <button type="button" class="btn btn-primary pmd-btn-icon pmd-ripple-effect mx-4" data-toggle="modal" data-target="#modalProjectUser">
        <i class="fa-solid fa-ellipsis"></i>
      </button>
    </div>
    
    <div class="container d-flex justify-content-between p-0">
      <x-SidebarUser :customer="$customer" :defaultProject="$defaultProject"/>

      <div class="w-75 p-4 d-flex flex-column">
        <h4>{{ $defaultProject->name }}</h4>
        <h6>{{ $defaultProject->type }}</h6>
        <div class="p-0">
          @php
          // Set your lower and upper date values
          // $lowerDate = strtotime('2023-01-01');
          // $upperDate = strtotime('2024-12-12');
          $lowerDate = strtotime($defaultProject->start_date);
          $upperDate = strtotime($defaultProject->end_date);
  
          // Get the current date
          $today = date("Y-m-d H:i:s");
          $currentDate = now()->setTimezone('America/Monterrey')->timestamp;
  
          // Calculate the raw progress percentage
          $rawProgressPercentage = (($currentDate - $lowerDate) / ($upperDate - $lowerDate)) * 100;

          // Ensure the progress percentage stays within the range of 0% to 100%
          $progressPercentage = max(0, min(100, $rawProgressPercentage));

          // Format progress percentage with 2 decimal places
          $formattedProgress = number_format($progressPercentage, 2);
          @endphp  

          <h6>Project progress: {{ $formattedProgress }}%</h6>
          <div class="progress mt-3 border border-secondary" style="height: 50px;">
              <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="background-color: #223326; width: {{ $progressPercentage }}%;" aria-valuenow="{{ $progressPercentage }}" aria-valuemin="0" aria-valuemax="100">
              </div>
              <div class="progress-bar bg-white" role="progressbar" style="width: {{ 100 - $progressPercentage }}%;" aria-valuenow="{{ 100 - $progressPercentage }}" aria-valuemin="0" aria-valuemax="100">
              </div>
            </div>
            <div class="container d-flex justify-content-between">
              <div class="d-flex flex-column align-items-center">
                <small>Start</small>
                <small>{{ date('Y-m-d', $lowerDate) }}</small>
              </div>
              <div class="d-flex flex-column align-items-center">
                <small>Today</small>
                <small>{{ now()->format('Y-m-d') }}</small>
              </div>
              <div class="d-flex flex-column align-items-center">
                <small>End</small>
                <small>{{ date('Y-m-d', $upperDate) }}</small>
              </div>
          </div>
      </div>
      </div>
    </div>

    <div style="background-color: white; padding: 10px; color: white;">h</div>

    <div class="container d-flex justify-content-center my-3">
      <h2>Montania's process</h2>
    </div>
    <div class="container">
        <div class="d-flex mb-2 w-50 mx-auto">
          <div class="col-3">
              <h5>{{ $defaultProject->end_date }}</h5>
          </div>
          <div class="col-3 d-flex justify-content-center">
              @if ($formattedProgress >= 0)
                  <i class="fa-solid fa-circle text-primary h2"></i>
              @else
                  <i class="fa-regular fa-circle text-primary h2"></i>
              @endif
          </div>
          <div class="col-6">
              <h5>Fin</h5>
          </div>
      </div>
      @foreach ($stages as $stage)
          <div class="d-flex mb-2 w-50 mx-auto">
              <div class="col-3">
                  <h5>{{ $stage->date }}</h5>
              </div>
              <div class="col-3 d-flex justify-content-center">
                  @if ($stage->completed)
                      <i class="fa-solid fa-circle text-primary h2"></i>
                  @else
                      <i class="fa-regular fa-circle text-primary h2"></i>
                  @endif
              </div>
              <div class="col-6">
                  <h5>{{ $stage->description }}</h5>
              </div>
          </div>
      @endforeach
      <div class="d-flex mb-2 w-50 mx-auto">
        <div class="col-3">
            <h5>{{ $defaultProject->start_date }}</h5>
        </div>
        <div class="col-3 d-flex justify-content-center">
          <i class="fa-solid fa-circle text-primary h2"></i>
        </div>
        <div class="col-6">
            <h5>Inicio</h5>
        </div>
      </div>
  </div>  

    <x-WhatsAppButton/>
    <x-Footer/>
@endsection
