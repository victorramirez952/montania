@extends('layouts.plantilla')

@section('title', 'Cliente recursos ' . $customer->email)

@section('content')
    <h1>Bienvenido a los recursos del cliente: {{$customer->email}}</h1>
@endsection
