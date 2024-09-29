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
        Schema::table('clases_hechizos', function (Blueprint $table) {
            $table->foreign(['hechizo_id'], 'clases_hechizos_hechizo_id_fkey')->references(['id'])->on('hechizos')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('clases_hechizos', function (Blueprint $table) {
            $table->dropForeign('clases_hechizos_hechizo_id_fkey');
        });
    }
};
