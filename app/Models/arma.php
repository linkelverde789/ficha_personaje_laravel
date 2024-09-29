<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class arma extends Model
{
    use HasFactory;

    protected $table = 'arma';
    protected $primaryKey='id_arma';

    protected $fillable = [
        'nombre',
        'peso',
        'dano',
        'tipo_dano',
        'descripcion'
    ];

    public $timestamps = false;
}
