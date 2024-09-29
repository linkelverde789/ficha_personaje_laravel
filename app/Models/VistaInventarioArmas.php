<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VistaInventarioArmas extends Model
{
    protected $table = 'vista_inventario_armas';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id_inventario',
        'id',
        'nombre',
        'peso',
        'descripcion',
        'dano',
        'tipo_dano',
        'cantidad',
    ];
    public function obtenerArmasPorPersonaje($id_inventario)
    {
        return self::where('id_inventario', $id_inventario)->get();
    }
}
