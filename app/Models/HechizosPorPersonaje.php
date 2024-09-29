<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HechizosPorPersonaje extends Model
{

    protected $table = 'hechizos_por_personaje';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id_personaje',
        'nombre_personaje',
        'nivel_hechizo',
        'cantidad_hechizos',
    ];
    public function obtenerHechizosPersonaje($id_personaje)
    {
        return self::where('id_personaje', $id_personaje)->get();
    }
    
}
