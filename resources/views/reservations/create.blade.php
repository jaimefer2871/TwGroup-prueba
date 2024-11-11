@extends('layouts.app')
@section('title', 'Crear Reservación')
@section('extra_head')
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <h3>Crear Reservación</h3>
    <hr />
    <br />
    <form action="{{ route('reservation.store') }}" method="post" class="mt-4">
        @csrf()
        <div class="mb-3">
            <label for="room_id" class="form-label">Sala</label>
            <select name="room_id" id="room_id" class="form-control" required>
                <option value="">Seleccione</option>
                @foreach ($listRooms as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="date_reservation" class="form-label">Fecha y Hora</label>
            <input type="text" required class="form-control" name="date_reservation" id="date_reservation"
                placeholder="Seleccione fecha y hora" value="{{ old('date_reservation') }}" />
        </div>
        <button class="btn btn-lg btn-primary float-end" type="submit">Reservar</button>
    </form>
@endsection
@push('scripts')
    <script>
        $('#date_reservation').datetimepicker({
            uiLibrary: 'bootstrap5',
            footer: true,
            modal: true,
            format: 'yyyy-mm-dd HH:MM'
        });
    </script>
@endpush
