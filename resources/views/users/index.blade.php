@extends('layouts.app')

@section('title', 'Usuarios')

@section('content')
    <h1>Users</h1>
    <ol>
    @foreach ($users as $user)
        <li>
            {{-- <span>{{ $user->phone }}</span> --}}
            <a href="{{route('users.edit', $user)}}">{{$user->first_names}} {{$user->last_names}}</a>
        </li>
    @endforeach
    </ol>
@endsection