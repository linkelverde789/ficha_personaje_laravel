<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VistaEquipoArmas extends Model
{
    protected $table = 'vista_equipo_armas';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id_personaje',
        'id',
        'nombre',
        'descripcion',
        'dano',
        'tipo_dano',
        'tipo_equipo',
    ];
    public function obtenerArmasPorPersonaje($id_personaje)
    {
        return self::where('id_personaje', $id_personaje)->get();
    }
}
