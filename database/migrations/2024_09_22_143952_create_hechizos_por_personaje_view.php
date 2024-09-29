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
        DB::statement("CREATE VIEW \"hechizos_por_personaje\" AS SELECT p.id_personaje,
    p.nombre AS nombre_personaje,
    h.nivel AS nivel_hechizo,
    count(h.id) AS cantidad_hechizos
   FROM ((hechizos_personajes hp
     JOIN hechizos h ON ((hp.id_hechizo = h.id)))
     JOIN personajes p ON ((hp.id_personaje = p.id_personaje)))
  GROUP BY p.id_personaje, p.nombre, h.nivel
  ORDER BY p.id_personaje, h.nivel;");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS \"hechizos_por_personaje\"");
    }
};
