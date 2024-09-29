<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VistaEquipoEscudos extends Model
{
    use HasFactory;

    protected $table = 'vista_equipo_escudos';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = ['id_personaje', 'id', 'nombre', 'descripcion', 'defensa', 'tipo_equipo'];
    function obtenerEscudoPersonaje($id_personaje)
    {
        return self::where('id_personaje', $id_personaje)->get();
    }

}
