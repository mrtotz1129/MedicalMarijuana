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
            $table->integer('intBedIdFK')
                ->unsigned();
            $table->integer('intAdmissionStatusIdFK')
                ->unsigned();
            $table->dateTime('datAdmission');
            $table->string('strAdmissionRemarks');
            $table->integer('intDoctorIdFK')
                ->unsigned();
            $table->timestamps();

            $table->foreign('intPatientIdFK')
                ->references('intPatientId')
                ->on('tblPatient')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('intBedIdFK')
                ->references('intBedId')
                ->on('tblBed')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('intAdmissionStatusIdFK')
                ->references('intStatusId')
                ->on('tblStatus')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('intDoctorIdFK')
                ->references('intEmployeeId')
                ->on('tblEmployee')
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
