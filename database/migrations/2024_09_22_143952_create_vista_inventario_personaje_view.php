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
        DB::statement("CREATE VIEW \"vista_inventario_personaje\" AS SELECT p.id_personaje,
    p.nombre AS nombre_personaje,
    COALESCE(a.nombre, 'N/A'::character varying) AS nombre_armadura,
    COALESCE(i_a.cantidad, 0) AS cantidad_armadura,
    (COALESCE(a.peso, (0)::numeric) * (COALESCE(i_a.cantidad, 0))::numeric) AS peso_total_armadura,
    COALESCE(ar.nombre, 'N/A'::character varying) AS nombre_arma,
    COALESCE(i_ar.cantidad, 0) AS cantidad_arma,
    (COALESCE(ar.peso, (0)::numeric) * (COALESCE(i_ar.cantidad, 0))::numeric) AS peso_total_arma,
    COALESCE(e.nombre, 'N/A'::character varying) AS nombre_escudo,
    COALESCE(i_e.cantidad, 0) AS cantidad_escudo,
    (COALESCE(e.peso, (0)::numeric) * (COALESCE(i_e.cantidad, 0))::numeric) AS peso_total_escudo,
    COALESCE(o.nombre, 'N/A'::character varying) AS nombre_objeto_normal,
    COALESCE(i_o.cantidad, 0) AS cantidad_objeto_normal,
    (COALESCE(o.peso, (0)::numeric) * (COALESCE(i_o.cantidad, 0))::numeric) AS peso_total_objeto_normal
   FROM (((((((((personajes p
     LEFT JOIN inventario i ON ((i.id_personaje = p.id_personaje)))
     LEFT JOIN inventario_armadura i_a ON ((i_a.id_inventario = i.id_inventario)))
     LEFT JOIN armadura a ON ((a.id_armadura = i_a.id_armadura)))
     LEFT JOIN inventario_arma i_ar ON ((i_ar.id_inventario = i.id_inventario)))
     LEFT JOIN arma ar ON ((ar.id_arma = i_ar.id_arma)))
     LEFT JOIN inventario_escudo i_e ON ((i_e.id_inventario = i.id_inventario)))
     LEFT JOIN escudo e ON ((e.id_escudo = i_e.id_escudo)))
     LEFT JOIN inventario_objeto_normal i_o ON ((i_o.id_inventario = i.id_inventario)))
     LEFT JOIN objeto_normal o ON ((o.id_objeto_normal = i_o.id_objeto_normal)));");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS \"vista_inventario_personaje\"");
    }
};
