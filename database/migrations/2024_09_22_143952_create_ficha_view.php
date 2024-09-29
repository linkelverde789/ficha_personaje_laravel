<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("CREATE VIEW \"ficha\" AS SELECT personajes.id_personaje,
    personajes.nombre,
    personajes.clase,
    personajes.raza,
    personajes.nivel,
    personajes.experiencia,
    personajes.fuerza,
    personajes.destreza,
    personajes.constitucion,
    personajes.inteligencia,
    personajes.sabiduria,
    personajes.peso_total,
    personajes.capacidad,
    personajes.carisma,
    personajes.oro,
    personajes.historia_personaje,
    personajes.alineamiento,
    personajes.hp,
    personajes.velocidad,
    personajes.iniciativa,
    personajes.transfondo,
    personajes.idiomas,
    personajes.personalidad,
    personajes.ideales,
    personajes.lazos,
    personajes.defectos,
    habilidades_personaje.atletismo,
    habilidades_personaje.acrobacias,
    habilidades_personaje.juego_de_manos,
    habilidades_personaje.sigilo,
    habilidades_personaje.arcano,
    habilidades_personaje.historia,
    habilidades_personaje.investigacion,
    habilidades_personaje.naturaleza,
    habilidades_personaje.religion,
    habilidades_personaje.perspicacia,
    habilidades_personaje.medicina,
    habilidades_personaje.percepcion,
    habilidades_personaje.supervivencia,
    habilidades_personaje.trato_con_animales,
    habilidades_personaje.\"engaño\",
    habilidades_personaje.interpretacion,
    habilidades_personaje.intimidacion,
    habilidades_personaje.\"persuasión\"
   FROM (personajes
     JOIN habilidades_personaje USING (id_personaje));");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS \"ficha\"");
    }
};
