@extends('layouts.plantilla')

@section('title', 'Proyecto portafolio ' . $project->name)

@section('content')
    <h1>Bienvenido al proyecto: {{$project->name}}</h1>
@endsection
