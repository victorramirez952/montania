@extends('layouts.plantilla')

@section('title', 'Servicios')

@section('content')
    <h1>Bienvenido a la pagina principal de servicios</h1>
    @foreach ($services as $service)
    <li>
        <a href="{{route('services.show', $service->id_service)}}">{{$service->name}}</a>
    </li>
    @endforeach
    <h1>También proveedores</h1>
    @foreach ($categories_providers as $category_provider)
    <li>
        <span>{{$category_provider->name}}</span>
    </li>
    @endforeach
@endsection