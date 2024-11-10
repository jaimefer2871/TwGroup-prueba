@extends('layouts.app')
@section('title', 'Login')
@section('extra_head')
    @vite(['resources/css/signin.css'])
@endsection
@section('content')
    @if (session('success'))
        <h6 class="alert alert-success">
            {{ session('success') }}
        </h6>
    @endif
    <div class="form-signin">
        <form method="post" action="{{ route('auth') }}">
            @csrf()
            <img class="mb-4" src="{{ asset('logo.png') }}" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Login TWGroup</h1>

            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
                <label for="floatingInput">Correo Electrónico</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                <label for="floatingPassword">Clave</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Ingresar</button>
        </form>
        <div class="mt-3">
            <a href="{{ route('user.register') }}">Haga clic Aquí para crear una cuenta</a>
        </div>
    </div>
@endsection
