<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrescriptiondetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblPrescriptionDetail', function(Blueprint $table){
            $table->increments('intPrescriptionDetailId');
            $table->integer('intPrescriptionIdFK')
                ->unsigned();
            $table->integer('intPrescriptionTypeId');
            $table->timestamps();

            $table->foreign('intPrescriptionIdFK')
                ->references('intPrescriptionId')
                ->on('tblPrescription')
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
        Schema::dropIfExists('tblPrescriptionDetail');
    }
}
