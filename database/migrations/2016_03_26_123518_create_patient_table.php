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
        Schema::create('tblPatient', function(Blueprint $table){
            $table->increments('intPatientId');
            $table->string('strFirstName');
            $table->string('strMiddleName')
                ->nullable();
            $table->string('strLastName');
            $table->date('dateBirthday');
            $table->string('strGender', 6);
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
