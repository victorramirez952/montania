@extends('layouts.plantilla')

@section('title', 'Portafolio')

@section('content')
    <h1>Portafolio</h1>
    @foreach ($projects as $project)
        <li>
            <a href="{{route('projects.show', $project->id)}}">{{$project->name}}</a>
        </li>
    @endforeach
@endsection