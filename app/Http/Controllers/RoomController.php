<?php

namespace App\Http\Controllers;

use App\Services\RoomService;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    protected $service;

    public function __construct(RoomService $roomService)
    {
        $this->service = $roomService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->service->list(15);

        return view('rooms.index', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($this->service->save($request->except('_token'))) {
            return redirect()->route("room.index")->with('success', 'La sala se ha creado con exito.');
        } else {
            redirect()->back()->with('error', 'Ha ocurrido un error al crear la sala. Por favor verifique los datos suministrados');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $room = $this->service->findById($id);

        return view('rooms.edit', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($this->service->update($id, $request->except('_token'))) {
            return redirect()->route("room.index")->with('success', 'La sala se ha modificado con exito.');
        } else {
            redirect()->back()->with('error', 'Ha ocurrido un error al modificar la sala. Por favor verifique los datos suministrados');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if ($this->service->destroy($id)) {
            return redirect()->route("room.index")->with('success', 'La sala se ha eliminado con exito.');
        } else {
            redirect()->back()->with('error', 'Ha ocurrido un error al eliminar la sala. Por favor verifique los datos suministrados');
        }
    }
}
