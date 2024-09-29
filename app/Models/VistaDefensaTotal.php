<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VistaDefensaTotal extends Model
{
    use HasFactory;
    protected $table = 'vista_defensa_total';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id_personaje',
        'defensa_armadura',
        'defensa_escudo',
        'defensa_total',
    ];
    public function obtenerDefensaPersonaje($id_personaje)
    {
        return self::where('id_personaje', $id_personaje)->get();
    }
}
