@extends('layouts.app')

@section('title', 'Cliente recursos ' . $customer->id_customer)
@section('body-style', 'background-color: #EBE5D3;')

@section('content')
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

    
    <div class="title text-center m-0" style="font-size: 30px; color: black;">Resources</div>

    <div class="container d-flex align-items-center p-2">
      <p class="text-center p-0 m-0 h-100">{{ $defaultProject->name }}</p>
      <button type="button" class="btn btn-primary pmd-btn-icon pmd-ripple-effect mx-4" data-toggle="modal" data-target="#modalProjectUser">
        <i class="fa-solid fa-ellipsis"></i>
      </button>
    </div>

    <div class="container d-flex justify-content-between p-0">
      <x-SidebarUser :customer="$customer" :defaultProject="$defaultProject"/> 
      <div class="w-75 d-flex justify-content-around">
        @foreach ($resources as $resource)
            <div class="project col-3" onclick="window.location.href = '{{ $resource->link }}'" style="cursor: pointer;">
                <img src="{{ asset('img/folder_svgrepo.com.png') }}" alt="Carpeta 1" width="112" height="89">
            <div class="project-title">{{ $resource->title }}</div>
            </div>
        @endforeach
      </div>
    </div>
    

    <div style="background-color: white; padding: 10px; color: white;">h</div>

    <x-WhatsAppButton/>
    <x-Footer/>
@endsection
