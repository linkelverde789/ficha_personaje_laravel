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
        Schema::create('personajes', function (Blueprint $table) {
            $table->increments('id_personaje');
            $table->string('nombre', 100);
            $table->integer('nivel')->nullable()->default(1);
            $table->integer('experiencia')->nullable()->default(0);
            $table->integer('fuerza')->nullable()->default(10);
            $table->integer('destreza')->nullable()->default(10);
            $table->integer('constitucion')->nullable()->default(10);
            $table->integer('inteligencia')->nullable()->default(10);
            $table->integer('sabiduria')->nullable()->default(10);
            $table->decimal('peso_total', 5)->nullable()->default(0);
            $table->decimal('capacidad', 5)->nullable();
            $table->integer('carisma')->nullable()->default(10);
            $table->integer('oro')->nullable()->default(0);
            $table->text('historia_personaje')->nullable();
            $table->integer('hp')->nullable()->default(10);
            $table->integer('velocidad')->nullable()->default(30);
            $table->integer('iniciativa')->nullable()->default(0);
            $table->text('idiomas')->nullable();
            $table->text('personalidad')->nullable();
            $table->text('ideales')->nullable();
            $table->text('lazos')->nullable();
            $table->text('defectos')->nullable();
        });
        DB::statement("alter table \"personajes\" add column \"clase\" clase_enum null");
        DB::statement("alter table \"personajes\" add column \"raza\" raza_enum null");
        DB::statement("alter table \"personajes\" add column \"alineamiento\" alineamiento_enum null");
        DB::statement("alter table \"personajes\" add column \"transfondo\" transfondo_enum null");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personajes');
    }
};
