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
        Schema::create('armadura', function (Blueprint $table) {
            $table->increments('id_armadura');
            $table->string('nombre', 50);
            $table->decimal('peso', 5);
            $table->integer('defensa');
            $table->text('descripcion')->nullable();
        });
        DB::statement("alter table \"armadura\" add column \"parte\" parte_enum not null");
        DB::statement("alter table \"armadura\" add column \"tipo\" tipo_armadura not null");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('armadura');
    }
};
