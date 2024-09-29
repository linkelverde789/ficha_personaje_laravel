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
        Schema::table('inventario_arma', function (Blueprint $table) {
            $table->foreign(['id_arma'], 'inventario_arma_id_arma_fkey')->references(['id_arma'])->on('arma')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['id_inventario'], 'inventario_arma_id_inventario_fkey')->references(['id_inventario'])->on('inventario')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inventario_arma', function (Blueprint $table) {
            $table->dropForeign('inventario_arma_id_arma_fkey');
            $table->dropForeign('inventario_arma_id_inventario_fkey');
        });
    }
};
