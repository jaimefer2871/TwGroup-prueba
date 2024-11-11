@extends('layouts.app')
@section('title', 'Crear Sala')
@section('content')
    <h3>Crear Sala</h3>
    <hr/>
    <br/>
    <form action="{{ route('room.store') }}" method="post" class="mt-4">
        @csrf()
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" required class="form-control" name="name" id="name" placeholder="Room" value="{{ old('name')}}" />
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descripción</label>
            <input type="text" class="form-control" name="description" id="description"
                placeholder="Description" value="{{ old('description')}}" />
        </div>
        <button class="btn btn-lg btn-primary float-end" type="submit">Crear Sala</button>
    </form>
@endsection
