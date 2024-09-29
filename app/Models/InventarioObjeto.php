<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InventarioObjeto extends Model{
    use HasFactory;

    protected $table='inventario_objeto';
    public $timestamps=false;
    protected $primaryKey=['id_inventario','id_objeto'];
    public $incrementing=false;
    protected $fillable=['id_inventario', 'id_objeto', 'cantidad'];
    public function inventario(): BelongsTo
    {
        return $this->belongsTo(Inventario::class, 'id_inventario');
    }

    public function objeto(): BelongsTo
    {
        return $this->belongsTo(objetoNormal::class, 'id_objeto');
    }

}