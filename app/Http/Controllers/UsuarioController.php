<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;  // Asegúrate de tener el modelo Usuario
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    // Método para procesar la inserción del usuario
    public function store(Request $request)
    {
        // Validar los datos recibidos
        $validatedData = $request->validate([
            'username' => 'required|max:255',
            'email' => 'required|email|unique:usuarios',  // Asegurar que el correo sea único
            'password' => 'required|min:8',  // Contraseña debe tener mínimo 8 caracteres
        ]);

        // Crear y guardar el nuevo usuario
        $usuario = new User();
        $usuario->username = $validatedData['username'];
        $usuario->email = $validatedData['email'];
        $usuario->password = Hash::make($validatedData['password']);  // Cifrar la contraseña
        $usuario->save();  // Insertar en la base de datos

        // Redirigir de vuelta con un mensaje de éxito
        return redirect()->back()->with('success', 'Usuario registrado correctamente');
    }
}
