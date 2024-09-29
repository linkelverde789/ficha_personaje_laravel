<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VistaInventarioArmaduras extends Model
{
    use HasFactory;
    protected $table = 'vista_inventario_armaduras';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id_inventario',
        'id',
        'nombre',
        'peso',
        'descripcion',
        'defensa',
        'tipo',
        'parte',
        'cantidad',
    ];
    public function obtenerArmadurasPorPersonaje($id_inventario)
    {
        return self::where('id_inventario', $id_inventario)->get();
    }
}
