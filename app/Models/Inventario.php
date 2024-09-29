<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;use Illuminate\Database\Eloquent\Factories\HasFactory;


class Inventario extends Model
{    use HasFactory;

    protected $table = 'inventario';

    public $timestamps = false;

    protected $primaryKey = 'id_inventario';

    public $incrementing = true;

    protected $fillable = [
        'id_personaje',
    ];

    public function personaje()
    {
        return $this->belongsTo(Personaje::class, 'id_personaje');
    }

    public function armas()
    {
        return $this->hasMany(InventarioArma::class, 'id_inventario');
    }

    public function armaduras()
    {
        return $this->hasMany(InventarioArmadura::class, 'id_inventario');
    }

    public function escudos()
    {
        return $this->hasMany(InventarioEscudo::class, 'id_inventario');
    }

    public function objetosNormales()
    {
        return $this->hasMany(InventarioObjeto::class, 'id_inventario');
    }
}
