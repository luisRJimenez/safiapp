<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_plans', function (Blueprint $table) {
            $table->id();
            $table->string('tpldescripcion', 50)->nullable();
            $table->double('tplpuntoscontado')->nullable();
            $table->double('tplpuntoscredito')->nullable();
            $table->boolean('tplestado');
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
        Schema::dropIfExists('tipo_plans');
    }
}
