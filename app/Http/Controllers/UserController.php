<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $service;

    public function __construct(UserService $userService)
    {
        $this->service = $userService;
    }

    public function register(Request $request)
    {
        return view('auth.register');
    }

    public function save(Request $request)
    {
        if ($this->service->save($request->except('_token'))) {
            return redirect()->route("login")->with('success', 'La cuenta se ha creado con exito.');
        } else {
            redirect()->back()->with('error', 'Ha ocurrido un error al crear la cuenta. Por favor verifique los datos suministrados');
        }
    }
}
