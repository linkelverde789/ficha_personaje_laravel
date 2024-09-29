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
        Schema::create('ranurasporclaseynivel', function (Blueprint $table) {
            $table->integer('nivel');
            $table->integer('nivel_hechizo');
            $table->integer('cantidad_ranuras')->nullable();
        });
        DB::statement("alter table \"ranurasporclaseynivel\" add column \"clase\" clase_enum not null");
        DB::statement("alter table \"ranurasporclaseynivel\" add primary key (\"clase\", \"nivel\", \"nivel_hechizo\")");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ranurasporclaseynivel');
    }
};
