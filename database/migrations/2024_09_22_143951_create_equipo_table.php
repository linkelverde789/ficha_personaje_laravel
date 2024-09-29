<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('equipo', function (Blueprint $table) {
            $table->integer('id_personaje');
            $table->integer('id_armadura')->nullable();
            $table->integer('id_arma')->nullable();
            $table->integer('id_escudo')->nullable();
        });
        DB::statement("alter table \"equipo\" add column \"tipo_equipo\" tipo_equipo_enum not null");
        DB::statement("alter table \"equipo\" add primary key (\"id_personaje\", \"tipo_equipo\")");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipo');
    }
};
