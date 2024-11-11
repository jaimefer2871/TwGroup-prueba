@extends('layouts.app')
@section('title', 'Salas')
@section('content')
    <div class="mt-4">
        <h3>Listado de Salas</h3>
        <hr />
        <br />
        <br />

        <a href="{{ route('room.create') }}" class="btn btn-primary">Crear Sala</a>
        <table class="table table-bordered table-hover mt-4 ">
            <thead>
                <tr class="table-secondary">
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Fecha Creación</th>
                    <th scope="col">Fecha de Modificación</th>
                    <th scope="col">Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data->items() as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->updated_at }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="actions">
                                <a href="{{ route('room.edit', $item->id)}}" class="btn btn-secondary">Editar</a>
                                <a href="{{ route('room.delete', $item->id)}}" class="btn btn-danger">Eliminar</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
