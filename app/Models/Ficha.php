<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ficha extends Model
{
    protected $table = 'ficha';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id_personaje',               // Clave primaria
        'nombre',                     // Nombre del personaje
        'clase',                      // Clase del personaje
        'raza',                       // Raza del personaje
        'nivel',                      // Nivel del personaje
        'experiencia',                // Experiencia del personaje
        'fuerza',                     // Fuerza del personaje
        'destreza',                   // Destreza del personaje
        'constitucion',               // Constitución del personaje
        'inteligencia',               // Inteligencia del personaje
        'sabiduria',                  // Sabiduría del personaje
        'carisma',                    // Carisma del personaje
        'peso_total',                 // Peso total del personaje
        'capacidad',                  // Capacidad del personaje
        'oro',                        // Oro del personaje
        'historia_personaje',         // Historia del personaje
        'alineamiento',               // Alineamiento del personaje
        'HP',                         // Puntos de vida del personaje
        'velocidad',                  // Velocidad del personaje
        'iniciativa',                 // Iniciativa del personaje
        'transfondo',                 // Transfondo del personaje
        'idiomas',                    // Idiomas del personaje
        'personalidad',               // Personalidad del personaje
        'ideales',                    // Ideales del personaje
        'lazos',                      // Lazos del personaje
        'defectos',                   // Defectos del personaje
        // Habilidades del personaje
        'atletismo',                  // Habilidad de atletismo
        'acrobacias',                 // Habilidad de acrobacias
        'juego_de_manos',            // Habilidad de juego de manos
        'sigilo',                     // Habilidad de sigilo
        'arcano',                     // Habilidad de arcano
        'historia',                   // Habilidad de historia
        'investigacion',              // Habilidad de investigación
        'naturaleza',                 // Habilidad de naturaleza
        'religion',                   // Habilidad de religión
        'perspicacia',                // Habilidad de perspicacia
        'medicina',                   // Habilidad de medicina
        'percepcion',                 // Habilidad de percepción
        'supervivencia',              // Habilidad de supervivencia
        'trato_con_animales',         // Habilidad de trato con animales
        'engaño',                     // Habilidad de engaño
        'interpretacion',             // Habilidad de interpretación
        'intimidacion',               // Habilidad de intimidación
        'persuasion',                 // Habilidad de persuasión
    ];

    public function obtenerFichaPersonaje($id_personaje){
        return self::where('id_personaje', $id_personaje)->get();
    }
}

