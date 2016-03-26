<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdmissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblAdmission', function(Blueprint $table){
            $table->increments('intAdmissionId');
            $table->integer('intPatientIdFK')
                ->unsigned();
            $table->integer('intRoomIdFK')
                ->unsigned();
            $table->dateTime('datAdmission');
            $table->integer('intAdmissionStatusIdFK')
                ->unsigned();

            $table->foreign('intPatientIdFK')
                ->references('intPatientId')
                ->on('tblPatient')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('intRoomIdFK')
                ->references('intRoomId')
                ->on('tblRoom')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('intAdmissionStatusIdFK')
                ->references('intStatusId')
                ->on('tblStatus')
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
        Schema::dropIfExists('tblAdmission');
    }
}
