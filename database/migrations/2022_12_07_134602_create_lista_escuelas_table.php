<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListaEscuelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lista_escuelas', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre',100);
            $table->string('CURP',18);
            $table->string('No_Control',16);
            $table->string('Materia',12);
            $table->string('Promedio',2);
            $table->string('Observaciones',200);

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
        Schema::dropIfExists('lista_escuelas');
        $table->dropColumn('Nombre');
        $table->dropColumn('CURP');
        $table->dropColumn('No_Control');
        $table->dropColumn('Materia');
        $table->dropColumn('Promedio');
        $table->dropColumn('Observaciones');
    }
}
