@extends('layouts.plantilla')

@section('title', 'Cliente proyectos' . $customer->email)

@section('content')
    <h1>Bienvenido a la pagina del cliente: {{$customer->first_names}}</h1>
@endsection
