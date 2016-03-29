<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblPatient', function(Blueprint $table) {
            $table->increments('intPatientId');
            $table->string('strFirstName', 100);
            $table->string('strMiddleName', 100)
                ->nullable();
            $table->string('strMachinePatientId')
                ->nullable();
            $table->string('strLastName', 100);
            $table->string('strGender', 10);
            $table->date('dateBirthday');
            $table->text('txtAddress')
                ->nullable();
            $table->string('strEmail');
            $table->string('strContactNumber')
                ->nullable();
            $table->text('txtPatientImgPath')
                ->nullable();
            $table->integer('intStatus');
            $table->timestamps();

            $table->unique(['strFirstName', 'strMiddleName', 'strLastName'], 'uq_patient_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblPatient');
    }
}
