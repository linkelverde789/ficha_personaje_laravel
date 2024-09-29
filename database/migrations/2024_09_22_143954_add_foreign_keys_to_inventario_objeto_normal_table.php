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
        Schema::table('inventario_objeto_normal', function (Blueprint $table) {
            $table->foreign(['id_inventario'], 'inventario_objeto_normal_id_inventario_fkey')->references(['id_inventario'])->on('inventario')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['id_objeto_normal'], 'inventario_objeto_normal_id_objeto_normal_fkey')->references(['id_objeto_normal'])->on('objeto_normal')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inventario_objeto_normal', function (Blueprint $table) {
            $table->dropForeign('inventario_objeto_normal_id_inventario_fkey');
            $table->dropForeign('inventario_objeto_normal_id_objeto_normal_fkey');
        });
    }
};
