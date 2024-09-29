<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('equipo', function (Blueprint $table) {
            $table->foreign(['id_arma'], 'equipo_id_arma_fkey')->references(['id_arma'])->on('arma')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['id_armadura'], 'equipo_id_armadura_fkey')->references(['id_armadura'])->on('armadura')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['id_escudo'], 'equipo_id_escudo_fkey')->references(['id_escudo'])->on('escudo')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['id_personaje'], 'equipo_id_personaje_fkey')->references(['id_personaje'])->on('personajes')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('equipo', function (Blueprint $table) {
            $table->dropForeign('equipo_id_arma_fkey');
            $table->dropForeign('equipo_id_armadura_fkey');
            $table->dropForeign('equipo_id_escudo_fkey');
            $table->dropForeign('equipo_id_personaje_fkey');
        });
    }
};
