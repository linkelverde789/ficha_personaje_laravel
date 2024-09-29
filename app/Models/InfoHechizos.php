<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoHechizos extends Model
{
    use HasFactory;

    protected $table = 'info_hechizos';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id_personaje',
        'nombre',
        'nivel',
        'tipo',
        'descripcion',
        'daño',
        'distancia',
        'tiempo_carga',
        'duracion',
        'componentes',

    ];
    public function obtenerHechizosPersonajes($id_personaje)
    {
        return self::where('id_personaje', $id_personaje)->get();
    }
}
