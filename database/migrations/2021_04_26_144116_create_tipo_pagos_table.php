<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoPagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_pagos', function (Blueprint $table) {
            $table->id();
            $table->string('tppdescripcion', 255)->nullable();
            $table->integer('tppvalor')->nullable();
            $table->integer('tppafibasico');
            $table->integer('tppcodagencia');
            $table->integer('tppbasicovalor');
            $table->integer('tppmetabono');
            $table->integer('tppvalorbono');
            $table->integer('tppcarneadi');
            $table->integer('tppporcabono');
            $table->integer('tppnumafiliados');
            $table->integer('tppnumcarnes');
            $table->boolean('tppestado');
            $table->boolean('tpppagacomision');
            $table->foreignId('tipo_plans_id')->constrained()->onDelete('restrict');
            $table->foreignId('tipocontrato_id')->constrained()->onDelete('restrict');
            $table->string('tppgrabo');
            $table->string('tppmodif');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_pagos');
    }
}
