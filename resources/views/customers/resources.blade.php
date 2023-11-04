@extends('layouts.app')

@section('title', 'Cliente recursos ' . $customer->id_customer)

@section('content')
    <h1>Bienvenido a los recursos del cliente: {{$customer->user->email}}</h1>
@endsection
