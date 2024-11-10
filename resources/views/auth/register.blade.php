@extends('layouts.app')
@section('title', 'Registro de Cliente')

@section('content')
    <form action="{{ route('user.save') }}" method="post" class="mt-4">
        @csrf()
        <div class="mb-3">
            <label for="name" class="form-label">Nombre Completo</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Jaime Fernandez">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="text" class="form-control" name="email" id="email" placeholder="j@gmail.com">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Clave Secreta</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="xxxxx">
        </div>
        <button class="btn btn-lg btn-primary float-end" type="submit">Crear Cuenta</button>
    </form>
@endsection
