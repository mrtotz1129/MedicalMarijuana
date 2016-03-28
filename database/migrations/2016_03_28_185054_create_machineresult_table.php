<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMachineresultTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblMachineResult', function(Blueprint $table){
            $table->increments('intMachineResultId');
            $table->string('strMachinePatientIdFK')
                ->unsigned();
            $table->timestamps();

            $table->foreign('strMachinePatientIdFK')
                ->references('strMachinePatientId')
                ->on('tblPatient')
                ->onUpdate('cascade')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblMachineResult');
    }
}
