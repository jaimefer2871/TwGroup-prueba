<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Services\RoomService;
use App\Services\ReservationService;
use Illuminate\Support\Facades\Auth;

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

        $user = Auth::user();

        if (!$user->isAdmin()){
            $conditions['user_id'] = $user->id;
        }

        if ($request->has('room_id') && !empty($request->room_id)) {
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
        $listRooms = $this->roomService->getListPluck();

        return view('reservations.create', [
            'listRooms' => $listRooms
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dateTime = Carbon::createFromFormat('Y-m-d H:i', $request->date_reservation);

        $id = Auth::id();
        $request->merge(['user_id' => $id]);

        $existsReservation = $this->service->isReserved($request->room_id, $dateTime);

        if ($existsReservation) {
            return redirect()->route("reservation.index")->with('error', 'Ya existe una reservacion en este horario. Por favor seleccione otra fecha');
        } else {
            if ($this->service->save($request->except('_token'))) {
                return redirect()->route("reservation.index")->with('success', 'La reservacion se ha creado con exito.');
            } else {
                redirect()->back()->with('error', 'Ha ocurrido un error al crear la reservacion. Por favor verifique los datos suministrados');
            }
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
