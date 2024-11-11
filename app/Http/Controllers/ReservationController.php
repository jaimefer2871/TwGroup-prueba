<?php

namespace App\Http\Controllers;

use App\Services\ReservationService;
use App\Services\RoomService;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    protected $service;
    protected $roomService;

    public function __construct(ReservationService $reservationService, RoomService $roomService)
    {
        $this->service = $reservationService;
        $this->roomService = $roomService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $conditions = [];

        if ($request->has('room_id')) {
            $conditions['room_id'] = $request->input('room_id');
        }

        $data = $this->service->list(15, $conditions);

        $listRooms = $this->roomService->getListPluck();

        return view('reservations.index', [
            'data' => $data,
            'listRooms' => $listRooms
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     */
    public function approve(string $id)
    {
        if ($this->service->approve($id)) {
            return redirect()->route("reservation.index")->with('success', 'La reservacion se ha aprobado con exito.');
        } else {
            redirect()->back()->with('error', 'Ha ocurrido un error al aprobar la reservacion. Por favor verifique los datos suministrados');
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function reject(string $id)
    {
        if ($this->service->reject($id)) {
            return redirect()->route("reservation.index")->with('success', 'La reservacion se ha rechazado con exito.');
        } else {
            redirect()->back()->with('error', 'Ha ocurrido un error al rechazar la reservacion. Por favor verifique los datos suministrados');
        }
    }
}
