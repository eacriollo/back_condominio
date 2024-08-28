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

        Schema::create('propiedades', function (Blueprint $table) {
            $table->id();
            $table->string('numero_unidad');
            $table->string('ubicacion');
            $table->unsignedBigInteger('id_personas');
            $table->foreign('id_personas')->references('id')->on('personas');
            $table->unsignedBigInteger('id_coutas');
            $table->foreign('id_cuotas')->references('id')->on('cuotas');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('propiedades');
    }
};
