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
        DB::statement("CREATE VIEW \"vista_suma_peso_personaje\" AS SELECT id_personaje,
    nombre_personaje,
    COALESCE(sum(peso_total_armadura), (0)::numeric) AS suma_peso_armaduras,
    COALESCE(sum(peso_total_arma), (0)::numeric) AS suma_peso_armas,
    COALESCE(sum(peso_total_escudo), (0)::numeric) AS suma_peso_escudos,
    COALESCE(sum(peso_total_objeto_normal), (0)::numeric) AS suma_peso_objetos_normales,
    (((COALESCE(sum(peso_total_armadura), (0)::numeric) + COALESCE(sum(peso_total_arma), (0)::numeric)) + COALESCE(sum(peso_total_escudo), (0)::numeric)) + COALESCE(sum(peso_total_objeto_normal), (0)::numeric)) AS suma_peso_total
   FROM vista_inventario_personaje
  GROUP BY id_personaje, nombre_personaje;");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS \"vista_suma_peso_personaje\"");
    }
};
