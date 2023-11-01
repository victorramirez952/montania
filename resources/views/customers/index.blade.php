@extends('layouts.plantilla')

@section('title', 'Clientes')

@section('content')
    <h1>Clientes</h1>
    @foreach ($customers as $customer)
        <li>
            <a href="{{route('customers.show', $customer->email)}}">{{$customer->first_names}} {{$customer->last_names}}</a>
        </li>
    @endforeach
    <h4>Recursos</h4>
    @foreach ($customers as $customer)
        <li>
            <a href="{{route('customers.resources', $customer->email)}}">{{$customer->first_names}} {{$customer->last_names}}</a>
        </li>
    @endforeach
@endsection