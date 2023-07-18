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
        Schema::create('direccions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('proveedor_id')->nullable();
            $table->unsignedBigInteger('cliente_id')->nullable();
            $table->string('pais');
            $table->string('estado');
            $table->string('poblacion')->nullable();
            $table->string('colonia')->nullable();
            $table->string('entre_calle')->nullable();
            $table->string('ycalle')->nullable();
            $table->string('codigo_postal')->nullable();
            $table->string('numero_interior')->nullable();
            $table->string('numero_exterior')->nullable();

            $table->foreign('proveedor_id')->references('id')->on('personas');
            $table->foreign('cliente_id')->references('id')->on('personas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('direccions');
    }
};
