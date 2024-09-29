<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VistaInventarioEscudos extends Model
{
    use HasFactory;
    protected $table = 'vista_inventario_escudos';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id_inventario',
        'id',
        'nombre',
        'peso',
        'descripcion',
        'defensa',
        'cantidad',
    ];
    public function obtenerEscudosPorPersonaje($id_inventario)
    {
        return self::where('id_inventario', $id_inventario)->get();
    }
}
