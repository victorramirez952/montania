@extends('layouts.plantilla')

@section('title', 'Cliente recursos ' . $client->name)

@section('content')
    <h1>Bienvenido a los recursos del cliente: {{$client->name}}</h1>
@endsection
