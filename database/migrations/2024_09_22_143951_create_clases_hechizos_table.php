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
        Schema::create('clases_hechizos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hechizo_id');
            $table->integer('nivel_aprendido');
        });
        DB::statement("alter table \"clases_hechizos\" add column \"clase\" clase_enum not null");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clases_hechizos');
    }
};
