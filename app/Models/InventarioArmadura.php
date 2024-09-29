<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InventarioArmadura extends Model
{    use HasFactory;

    protected $table = 'inventario_armadura';

    // No necesitamos timestamps para esta tabla
    public $timestamps = false;

    // Definir la clave primaria compuesta
    protected $primaryKey = ['id_inventario', 'id_armadura'];

    // Eloquent no soporta claves primarias compuestas directamente, así que necesitas
    // establecer $incrementing a false.
    public $incrementing = false;

    protected $fillable = [
        'id_inventario',
        'id_armadura',
        'cantidad',
    ];

    // Relaciones
    public function inventario(): BelongsTo
    {
        return $this->belongsTo(Inventario::class, 'id_inventario');
    }

    public function armadura(): BelongsTo
    {
        return $this->belongsTo(Armadura::class, 'id_armadura');
    }
}
