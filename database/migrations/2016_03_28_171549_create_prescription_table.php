<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrescriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblPrescription', function(Blueprint $table){
            $table->increments('intPrescriptionId');
            $table->integer('intAdmissionIdFK')
                ->unsigned();
            $table->timestamps();

            $table->foreign('intAdmissionIdFK')
                ->references('intAdmissionId')
                ->on('tblAdmission')
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
        Schema::dropIfExists('tblPrescription');
    }
}
