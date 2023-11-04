@extends('layouts.app')

@section('title', 'Servicios ' . $service->name)

@section('content')
    <x-Navbar/>
    <div class="mt-5 pt-5"></div>
    <h1>Bienvenido al servicio: {{$service->name}}</h1>
@endsection
