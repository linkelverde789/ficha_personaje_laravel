<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class personaje extends Model
{
    use HasFactory;
    protected $table = 'personajes';
    protected $primaryKey = 'id_personaje';
    public $timestamps = false;
    protected $fillable = [
        'nombre',
        'clase',
        'raza',
        'nivel',
        'experiencia',
        'fuerza',
        'destreza',
        'constitucion',
        'inteligencia',
        'sabiduria',
        'peso_total',
        'capacidad',
        'carisma',
        'oro',
        'historia_personaje',
        'alineamiento',
        'hp',
        'velocidad',
        'iniciativa',
        'transfondo',
        'idiomas',
        'personalidad',
        'ideales',
        'lazos',
        'defectos',
    ];

    public function usuarios()
    {
        return $this->belongsToMany(User::class, 'usuarios_personajes', 'id_personaje', 'id_usuario');
    }

}
