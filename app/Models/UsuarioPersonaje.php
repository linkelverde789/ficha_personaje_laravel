<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class UsuarioPersonaje extends Model
{
    use HasFactory;

    protected $table = 'usuarios_personajes';
    public $timestamps = false;

    protected $primaryKey = ['id_personaje', 'id_usuario'];
    public $incrementing = false;

    protected $fillable = [
        'id_personaje',
        'id_usuario',
    ];
    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    public function personaje(): BelongsTo
    {
        return $this->belongsTo(personaje::class, 'id_personaje');
    }

}
