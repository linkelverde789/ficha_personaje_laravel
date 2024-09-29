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
        Schema::create('inventario_objeto_normal', function (Blueprint $table) {
            $table->integer('id_inventario');
            $table->integer('id_objeto_normal');
            $table->integer('cantidad')->nullable()->default(1);

            $table->primary(['id_inventario', 'id_objeto_normal']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventario_objeto_normal');
    }
};
