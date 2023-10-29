@extends('layouts.plantilla')

@section('title', 'Cliente proyectos' . $client->id)

@section('content')
    <h1>Bienvenido a la pagina del cliente: {{$client->name}}</h1>
@endsection
