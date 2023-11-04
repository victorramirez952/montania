@extends('layouts.app')

@section('title', 'Cliente proyectos ' . $customer->id_customer)

@section('content')
    <h1>Bienvenido a la pagina del cliente: {{$customer->user->first_names}}</h1>
@endsection
