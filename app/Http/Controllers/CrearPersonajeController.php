<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\personaje;
use App\Models\UsuarioPersonaje;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class CrearPersonajeController extends Controller
{
    public function showCharacterForm()
    {
        return view('crear_personaje');
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'Fuerza_base_hidden' => 'required|integer|min:8|max:20',
            'Destreza_base_hidden' => 'required|integer|min:8|max:20',
            'Constitución_base_hidden' => 'required|integer|min:8|max:20',
            'Inteligencia_base_hidden' => 'required|integer|min:8|max:20',
            'Sabiduría_base_hidden' => 'required|integer|min:8|max:20',
            'Carisma_base_hidden' => 'required|integer|min:8|max:20',
            'HP_hidden' => 'required|integer|min:1',
        ]);

        $personaje = new personaje([
            'nombre' => $request->input('name'),
            'raza' => $request->input('raza'),
            'clase' => $request->input('clase'),
            'transfondo' => $request->input('transfondo'),
            'alineamiento' => $request->input('alineamiento'),
            'idiomas' => $request->input('languages'),
            'personalidad' => $request->input('personality'),
            'ideales' => $request->input('ideals'),
            'lazos' => $request->input('bonds'),
            'defectos' => $request->input('flaws'),
            'historia_personaje' => $request->input('historia'),

            'fuerza' => $validated['Fuerza_base_hidden'],
            'destreza' => $validated['Destreza_base_hidden'],
            'constitucion' => $validated['Constitución_base_hidden'],
            'inteligencia' => $validated['Inteligencia_base_hidden'],
            'sabiduria' => $validated['Sabiduría_base_hidden'],
            'carisma' => $validated['Carisma_base_hidden'],
            'HP' => $validated['HP_hidden'],
        ]);
        $user = Auth::user();
        $personaje->save();
        $usuarioPersonaje = new UsuarioPersonaje([
            'id_personaje' => $personaje->id_personaje,
            'id_usuario' => $user->id_usuario,
        ]);
        $usuarioPersonaje->save();
        $request->session()->put('personaje_id', $personaje->id_personaje);
        return redirect()->route('inventario')->with('success', 'Personaje creado exitosamente.');
    }
}
