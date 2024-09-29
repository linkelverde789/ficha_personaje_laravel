<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class InventarioArma extends Model
{    use HasFactory;

    protected $table = 'inventario_arma';

    public $timestamps = false;

    protected $primaryKey = ['id_inventario', 'id_arma'];
    public $incrementing = false;

    protected $fillable = [
        'id_inventario',
        'id_arma',
        'cantidad',
    ];

    public function inventario(): BelongsTo
    {
        return $this->belongsTo(Inventario::class, 'id_inventario');
    }

    public function arma(): BelongsTo
    {
        return $this->belongsTo(Arma::class, 'id_arma');
    }
}
