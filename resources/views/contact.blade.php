@extends('layouts.app')

@section('title', 'Contactanos')

@section('content')
<div style="background-color: #EBE5D3;">
    <x-Navbar />
    <header class="title-bg title">
        <p class="text-center" style="font-size: 45px;">Contact Us</p>
    </header>
    <div class="container mt-5">
        <div class="row">
            <!-- Columna para el formulario de contacto -->
            <div class="col-md-6">
                <form class="contact-form" method="POST" action="{{ route('msg-confirm') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" value="Mark Grayson" class="form-control" id="name" name="name" required placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" value="mark.grayson@gmail.com" id="email" name="email" required
                            placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="tel" class="form-control" value="1234567890" id="phone" name="phone" placeholder="Phone">
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" class="form-control" value="Subject X" id="subject" name="subject" required
                            placeholder="Subject">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="4" required placeholder="Description" style="resize: none;">Lorem ipsum</textarea>
                    </div>
                    <button type="submit" class="btn"
                            style="color: #EBE5D3;">Enviar
                    </button>
                </form>
            </div>
            <!-- Columna para la imagen -->
            <div class="col-md-6">
                <img src="{{ asset('img/img-contactanos.webp') }}" class="img-fluid" alt="Imagen">
            </div>
        </div>
    </div>
    <br>
    <br>
    <x-WhatsAppButton/>
    <x-Footer/>
</div>
@endsection
