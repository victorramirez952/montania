@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <x-Navbar/> {{-- Importamos el componente Navbar--}}
    <header class="title-bg title">
        <p class="text-center" style="font-size: 45px;">Message Sent</p>
      </header>
  
      <div class="text-center" style="margin-top: 200px; margin-bottom: 200px;">
          <h1>We received your message!</h1>
          <p>Thank you for your message {{ $name }}. We will contact you soon.</p>
          <br>
          <a href="{{ route('publicHome') }}" class="btn btn-primary continue">Continue</a>
      </div>
      
    <x-WhatsAppButton/>
    <x-Footer/>
@endsection

