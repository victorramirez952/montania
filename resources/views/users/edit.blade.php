@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('users.update', $user) }}">
                        @csrf
                        @method('put')

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" value="{{ $user->email }}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="first_names" class="col-md-4 col-form-label text-md-end">{{ __('First names') }}</label>

                            <div class="col-md-6">
                                <input id="first_names" type="text" value="{{ $user->first_names }}" class="form-control @error('first_names') is-invalid @enderror" name="first_names" value="{{ old('first_names') }}" required autocomplete="last_names" autofocus>

                                @error('first_names')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="last_names" class="col-md-4 col-form-label text-md-end">{{ __('Last names') }}</label>

                            <div class="col-md-6">
                                <input id="last_names" type="text" value="{{ $user->last_names }}" class="form-control @error('last_names') is-invalid @enderror" name="last_names" value="{{ old('last_names') }}" required autocomplete="last_names" autofocus>

                                @error('last_names')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 d-flex align-items-center">
                            <label for="editPassword" class="col-md-4 col-form-label text-md-end">{{ __('Edit password ?') }}</label>
                        
                            <div class="col-md-6">
                                <input id="editPassword" type="checkbox" class="form-check-input @error('editPassword') is-invalid @enderror" name="editPassword" value="0" autocomplete="editPassword">
                                {{-- <label for="type" class="form-check-label">{{ __('Admin') }}</label> --}}
                        
                                @error('editPassword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="text" value="{{ $user->password }}" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="text" value="{{ $user->password }}" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-3 d-flex align-items-center">
                            <label for="type" class="col-md-4 col-form-label text-md-end">{{ __('Admin') }}</label>
                        
                            <div class="col-md-6">
                                <input id="type" type="checkbox" {{ $user->type == 1 ? 'checked' : '' }} class="form-check-input @error('type') is-invalid @enderror" name="type" value="1" autocomplete="type">
                                {{-- <label for="type" class="form-check-label">{{ __('Admin') }}</label> --}}
                        
                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
