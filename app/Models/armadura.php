<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class armadura extends Model
{    use HasFactory;

    protected $table = 'armadura';
    protected $primaryKey='id_armadura';

    protected $fillable = [
        'nombre',
        'parte',
        'peso',
        'defensa',
        'tipo',
        'descripcion'
    ];

    public $timestamps = false;

}
