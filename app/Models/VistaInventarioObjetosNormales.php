<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VistaInventarioObjetosNormales extends Model
{
    use HasFactory;
    protected $table = 'vista_inventario_objetos_normales';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id_inventario',
        'id',
        'nombre',
        'peso',
        'descripcion',
        'cantidad',
    ];
    public function obtenerObjetosPorPersonaje($id_inventario)
    {
        return self::where('id_inventario', $id_inventario)->get();
    }
}
