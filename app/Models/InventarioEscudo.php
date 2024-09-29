<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InventarioEscudo extends Model
{    use HasFactory;

    protected $table = 'inventario_escudo';
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'id_inventario',
        'id_escudo',
        'cantidad',
    ];
    public function inventario(): BelongsTo
    {
        return $this->belongsTo(Inventario::class, 'id_inventario');
    }
    public function escudo(): BelongsTo
    {
        return $this->belongsTo(Inventario::class, 'id_escudo');
    }
}