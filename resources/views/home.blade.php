@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @can('publicHome')
                        <h3>Welcome to the <b>Admin</b> Dashboard</h3>
                    @endcan
                    @cannot('publicHome')
                        <h3>Welcome to the User Dashboard</h3>
                    @endcannot
                    {{-- {{ __('You are logged in!') }} --}}
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
