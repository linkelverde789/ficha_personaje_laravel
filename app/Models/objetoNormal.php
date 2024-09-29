<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class objetoNormal extends Model
{    use HasFactory;

    protected $table = 'objeto_normal';
    protected $primaryKey=['id_objeto_normal'];

    protected $fillable = [
        'nombre',
        'peso',
        'descripcion'
    ];

    public $timestamps = false; // Deshabilitar timestamps
}
