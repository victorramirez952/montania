@extends('layouts.app')

@section('title', 'Proyecto portafolio ' . $project->name)

@section('content')
    <x-Navbar/>
    <div class="mt-5 pt-5"></div>
    <h1>Bienvenido al proyecto: {{$project->name}}</h1>
@endsection
