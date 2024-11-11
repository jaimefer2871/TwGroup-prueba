@extends('layouts.app')
@section('title', 'Reservaciones')
@section('content')
    <div class="mt-4">
        <h3>Listado de Reservaciones</h3>
        <hr />
        <br />
        <br />

        <fieldset>
            <legend>Filtro</legend>
            <form action="{{ route('reservation.index') }}">
                <div class="row">
                    <div class="col">
                        <select class="form-control" name="room_id">
                            <option value="">Seleccione</option>
                            @foreach ($listRooms as $id => $name)
                                <option value="{{ $id }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-lg btn-primary float-end" type="submit">Buscar</button>
                    </div>
                </div>
            </form>
        </fieldset>
        <br />
        {{-- <a href="{{ route('room.create') }}" class="btn btn-primary">Crear Sala</a> --}}
        <table class="table table-bordered table-hover mt-4 ">
            <thead>
                <tr class="table-secondary">
                    <th class="text-center" scope="col">Sala</th>
                    <th class="text-center" scope="col">Cliente</th>
                    <th class="text-center" scope="col">Fecha de Reservación</th>
                    <th class="text-center" scope="col">Estado</th>
                    <th class="text-center" scope="col">Fecha de Creacion</th>
                    <th class="text-center" scope="col">Fecha de Modificación</th>
                    <th class="text-center" scope="col">Acción</th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($data->items()))
                    @foreach ($data->items() as $item)
                        <tr>
                            <td class="text-center">{{ $item->room->name }}</td>
                            <td class="text-center">{{ $item->user->name }}</td>
                            <td class="text-center">{{ $item->date_reservation }}</td>
                            <td class="text-center">{!! $item->getStatus() !!}</td>
                            <td class="text-center">{{ $item->created_at }}</td>
                            <td class="text-center">{{ $item->updated_at }}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group" aria-label="actions">
                                    @if ($item->status != '2')
                                        <a href="{{ route('reservation.approve', $item->id) }}"
                                            class="btn btn-success">Aprobar</a>
                                    @endif
                                    @if ($item->status != '3')
                                        <a href="{{ route('reservation.reject', $item->id) }}"
                                            class="btn btn-danger">Rechazar</a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
@endsection
