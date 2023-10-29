@extends('layouts.plantilla')

@section('title', 'Clientes')

@section('content')
    <h1>Clientes</h1>
    @foreach ($clients as $client)
        <li>
            <a href="{{route('clients.show', $client->id)}}">{{$client->name}}</a>
        </li>
    @endforeach
@endsection