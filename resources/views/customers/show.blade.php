@extends('layouts.app')

@section('title', 'Cliente proyectos ' . $customer->id_customer)
@section('body-style', 'background-color: #EBE5D3;')

@section('content')
    {{-- <h1>Bienvenido a la pagina del cliente: {{$customer->user->first_names}}</h1> --}}
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
    
    <button onclick="window.location.href = '{{ route('customers.resources', ['customer' => $customer]) }}'">Recursos</button>
    <div style="background-color: white; padding: 10px; color: white;"></div>
    
    <h4 class="w-100 py-5 text-center">Dashboard</h4>

    <div style="background-color: white; padding: 10px; color: white;">h</div>

    <x-WhatsAppButton/>
    <x-Footer/>
@endsection
