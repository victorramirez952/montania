@extends('layouts.plantilla')

@section('title', 'Servicios')

@section('content')
    <h1>Bienvenido a la pagina principal de servicios</h1>
    @foreach ($services as $service)
    <li>
        <a href="{{route('services.show', $service->id)}}">{{$service->name}}</a>
    </li>
    @endforeach
    <h1>También proveedores</h1>
    @foreach ($providers as $provider)
    <li>
        <a href="#">{{$provider->name}}</a>
    </li>
    @endforeach
@endsection