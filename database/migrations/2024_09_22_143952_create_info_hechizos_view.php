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
        DB::statement("CREATE VIEW \"info_hechizos\" AS SELECT hechizos.id,
    hechizos.nombre,
    hechizos.nivel,
    hechizos.tipo,
    hechizos.descripcion,
    hechizos.\"daño\",
    hechizos.distancia,
    hechizos.tiempo_carga,
    hechizos.duracion,
    hechizos.componentes,
    hechizos_personajes.id_personaje
   FROM (hechizos
     JOIN hechizos_personajes ON ((hechizos.id = hechizos_personajes.id_hechizo)));");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS \"info_hechizos\"");
    }
};
