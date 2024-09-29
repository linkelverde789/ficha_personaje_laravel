<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VistaEquipoPeso extends Model
{
    use HasFactory;

    protected $table='vista_equipo_peso';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id_personaje',
        'peso',
    ];
    public function obtenerPesoPersonaje($id_personaje)
    {
        return self::where('id_personaje', $id_personaje)->get();
    }
}
