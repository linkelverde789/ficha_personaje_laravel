<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;use Illuminate\Database\Eloquent\Factories\HasFactory;


class escudo extends Model
{    use HasFactory;

    protected $table = 'escudo';
    protected $primaryKey='id_escudo';

    protected $fillable = [
        'nombre',
        'peso',
        'defensa',
        'descripcion'
    ];

    public $timestamps = false;
}
