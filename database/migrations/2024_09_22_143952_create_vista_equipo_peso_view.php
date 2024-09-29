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
        DB::statement("CREATE VIEW \"vista_equipo_peso\" AS SELECT equipo.id_personaje,
    ((COALESCE(sum(armadura.peso), (0)::numeric) + COALESCE(sum(arma.peso), (0)::numeric)) + COALESCE(sum(escudo.peso), (0)::numeric)) AS peso
   FROM (((equipo
     LEFT JOIN arma USING (id_arma))
     LEFT JOIN escudo USING (id_escudo))
     LEFT JOIN armadura USING (id_armadura))
  GROUP BY equipo.id_personaje;");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS \"vista_equipo_peso\"");
    }
};
