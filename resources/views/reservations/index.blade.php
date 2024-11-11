@extends('layouts.app')
@section('title', 'Reservaciones')
@section('content')
    <div class="mt-4">
        <h3>Listado de Reservaciones</h3>
        <hr />
        <br />
        <br />

        @if (auth()->user()->isAdmin())
            @include('reservations.search')
        @else
            <a href="{{ route('reservation.create') }}" class="btn btn-primary">Reservar</a>
        @endif
        <br />
        <table class="table table-bordered table-hover mt-4 ">
            <thead>
                <tr class="table-secondary">
                    <th class="text-center" scope="col">Sala</th>
                    <th class="text-center" scope="col">Cliente</th>
                    <th class="text-center" scope="col">Fecha de Reservación</th>
                    <th class="text-center" scope="col">Estado</th>
                    <th class="text-center" scope="col">Fecha de Creacion</th>
                    <th class="text-center" scope="col">Fecha de Modificación</th>
                    @if (auth()->user()->isAdmin())
                        <th class="text-center" scope="col">Acción</th>
                    @endif
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
                            @if (auth()->user()->isAdmin())
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
                            @endif
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
@endsection
