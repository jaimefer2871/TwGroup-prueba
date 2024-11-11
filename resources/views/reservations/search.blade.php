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
