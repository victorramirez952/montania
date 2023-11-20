@extends('layouts.app')

@section('title', 'Cliente recursos ' . $customer->id_customer)
@section('body-style', 'background-color: #EBE5D3;')

@section('content')
    {{-- <h1>Bienvenido a los recursos del cliente: {{$customer->user->email}}</h1> --}}
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
    
    <div class="conta">
      <div class="title text-center" style="font-size: 30px; color: black;">Mis Proyectos</div>
      
      <div class="projects-grid">
        @foreach ($projects as $project)
            <div class="project">
                <img src="{{ asset('img/folder_svgrepo.com.png') }}" alt="Carpeta 1" width="112" height="89">
            <div class="project-title">{{ $project->name }}</div>
            </div>
        @endforeach
      </div>
      <br>
      <br>
      <br>
    </div>

    <div style="background-color: white; padding: 10px; color: white;">h</div>

    <x-WhatsAppButton/>
    <x-Footer/>
@endsection
