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
        Schema::disableForeignKeyConstraints();

        Schema::create('ingresos_egresos', function (Blueprint $table) {
            $table->id();
            $table->string('documento');
            $table->decimal('valor', 10, 2)->default(0);
            $table->timestamp('fecha');
            $table->text('descripcion');
            $table->unsignedBigInteger('id_metodo_pago');
            $table->foreign('id_metodo_pago')->references('id')->on('metodo_pagos');
            $table->unsignedBigInteger('id_propiedades');
            $table->foreign('id_propiedades')->references('id')->on('propiedades');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingresos_egresos');
    }
};
