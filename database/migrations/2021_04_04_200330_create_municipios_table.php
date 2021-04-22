<?php

use Illuminate\Cache\Events\KeyForgotten;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Boolean;

class CreateMunicipiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('municipios', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('numcodigo')->nullable();
            $table->string('mundescripcion', 50);
            $table->char('muncabeceramun', 1)->nullable();
            $table->char('muncapitaldpto', 1)->nullable();
            //$table->integer('departamento_id')->unsigned();
            $table->smallInteger('departamento_id')->nullable();
            $table->char('munareametropo', 1)->nullable();
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
        Schema::dropIfExists('municipios');
    }
}
