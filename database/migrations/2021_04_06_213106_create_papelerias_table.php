<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\ForeignIdColumnDefinition;
use Illuminate\Support\Facades\Schema;

class CreatePapeleriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('papelerias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipo_papeleria_id')->constrained()->onDelete('restrict');
            $table->foreignId('User_id')->constrained()->onDelete('restrict');
            $table->integer('papnumero')->nullable()->unique()->index();
            $table->enum('papestado', ['asignado', 'reportado', 'anulado']);
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
        Schema::dropIfExists('papelerias');
    }
}
