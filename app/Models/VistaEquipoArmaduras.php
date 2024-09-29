<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VistaEquipoArmaduras extends Model
{
    use HasFactory;
    protected $table='vista_equipo_armaduras';

    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id_personaje',
        'id',
        'nombre',
        'descripcion',
        'defensa',
        'tipo',
        'parte',
        'tipo_equipo',
    ];

    public function obtenerArmadurasPorPersonaje($id_personaje){
        return self::where('id_personaje', $id_personaje)->get();
    }
}
