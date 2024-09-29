<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ObtenerPersonajesController extends Controller
{
    public function obtenerPersonajes()
    {
        $usuario = Auth::user();
        $personajes=$usuario->personajes;

        return view('home', compact('personajes'));
    }
}
