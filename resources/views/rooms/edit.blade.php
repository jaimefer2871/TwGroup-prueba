@extends('layouts.app')
@section('title', 'Editar Sala')
@section('content')
    <h3>Editar Sala</h3>
    <hr/>
    <br/>
    <form action="{{ route('room.update', $room->id) }}" method="post" class="mt-4">
        @csrf()
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" required class="form-control" name="name" id="name" placeholder="Room" value="{{ $room->name }}" />
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descripción</label>
            <input type="text" required class="form-control" name="description" id="description"
                placeholder="Description" value="{{ $room->description }}" />
        </div>
        <button class="btn btn-lg btn-primary float-end" type="submit">Actualizar</button>
    </form>
@endsection