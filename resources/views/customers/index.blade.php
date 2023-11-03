@extends('layouts.plantilla')

@section('title', 'Clientes')

@section('content')
    <h1>Clientes</h1>
    @foreach ($customers as $customer)
        <li>
            {{-- <span>{{ $customer->phone }}</span> --}}
            <a href="{{route('customers.show', $customer)}}">{{$customer->user->first_names}} {{$customer->user->last_names}}</a>
        </li>
    @endforeach
    <h4>Recursos</h4>
    @foreach ($customers as $customer)
        <li>
            <a href="{{route('customers.resources', $customer)}}">{{$customer->user->first_names}} {{$customer->user->last_names}}</a>
        </li>
    @endforeach
@endsection