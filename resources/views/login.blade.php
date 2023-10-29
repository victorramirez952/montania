@extends('layouts.plantilla')

@section('title', 'Login')

@section('content')
    <x-Navbar/> {{-- Importamos el componente Navbar--}}
    <h1 class="headerLogin">Pagina de login</h1>
    <button type="button" onclick="clickButton();" class="btn btn-primary d-block">Haz clic</button>
    <img src="{{ asset('images/clone.png') }}" width="150" class="mt-5 border" alt="Descripción de la imagen">
@endsection

