@extends('layouts.plantilla')

@section('title', 'Servicios ' . $service->name)

@section('content')
    <h1>Bienvenido al servicio: {{$service->name}}</h1>
@endsection
