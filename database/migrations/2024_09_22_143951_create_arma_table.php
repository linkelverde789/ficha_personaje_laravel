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
        Schema::create('arma', function (Blueprint $table) {
            $table->increments('id_arma');
            $table->string('nombre', 50);
            $table->decimal('peso', 5);
            $table->string('dano', 6);
            $table->text('descripcion')->nullable();
        });
        DB::statement("alter table \"arma\" add column \"tipo_dano\" tipo_dano not null");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arma');
    }
};
