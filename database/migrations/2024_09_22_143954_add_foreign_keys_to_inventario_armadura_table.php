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
        Schema::table('inventario_armadura', function (Blueprint $table) {
            $table->foreign(['id_armadura'], 'inventario_armadura_id_armadura_fkey')->references(['id_armadura'])->on('armadura')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['id_inventario'], 'inventario_armadura_id_inventario_fkey')->references(['id_inventario'])->on('inventario')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inventario_armadura', function (Blueprint $table) {
            $table->dropForeign('inventario_armadura_id_armadura_fkey');
            $table->dropForeign('inventario_armadura_id_inventario_fkey');
        });
    }
};
