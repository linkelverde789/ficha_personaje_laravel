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
        Schema::table('inventario_escudo', function (Blueprint $table) {
            $table->foreign(['id_escudo'], 'inventario_escudo_id_escudo_fkey')->references(['id_escudo'])->on('escudo')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['id_inventario'], 'inventario_escudo_id_inventario_fkey')->references(['id_inventario'])->on('inventario')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inventario_escudo', function (Blueprint $table) {
            $table->dropForeign('inventario_escudo_id_escudo_fkey');
            $table->dropForeign('inventario_escudo_id_inventario_fkey');
        });
    }
};
