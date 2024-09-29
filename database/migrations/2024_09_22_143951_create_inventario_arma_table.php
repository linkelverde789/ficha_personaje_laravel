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
        Schema::create('inventario_arma', function (Blueprint $table) {
            $table->integer('id_inventario');
            $table->integer('id_arma');
            $table->integer('cantidad')->nullable()->default(1);

            $table->primary(['id_inventario', 'id_arma']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventario_arma');
    }
};
