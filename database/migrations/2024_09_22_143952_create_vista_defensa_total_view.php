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
        DB::statement("CREATE VIEW \"vista_defensa_total\" AS SELECT e.id_personaje,
    COALESCE(sum(a.defensa), (0)::bigint) AS defensa_armadura,
    COALESCE(sum(es.defensa), (0)::bigint) AS defensa_escudo,
    (COALESCE(sum(a.defensa), (0)::bigint) + COALESCE(sum(es.defensa), (0)::bigint)) AS defensa_total
   FROM ((equipo e
     LEFT JOIN armadura a ON ((e.id_armadura = a.id_armadura)))
     LEFT JOIN escudo es ON ((e.id_escudo = es.id_escudo)))
  GROUP BY e.id_personaje;");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS \"vista_defensa_total\"");
    }
};
