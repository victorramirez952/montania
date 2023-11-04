@extends('layouts.app')

@section('content')
<x-NavbarAdmin/>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h3>Welcome to the Admin Dashboard</h3>
                    {{ __('You are logged in!') }}
                </div>
                @auth
                    <p>Welcome, {{ Auth::user() }}</p>
                @else
                    <p>User not authenticated</p>
                @endauth
            </div>
        </div>
    </div>
</div>
@endsection
