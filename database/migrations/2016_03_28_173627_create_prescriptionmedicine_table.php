<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrescriptionmedicineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblPrescriptionMedicine', function(Blueprint $table){
            $table->integer('intPrescriptionDetailIdFK')
                ->unsigned();
            $table->integer('intMedicineIdFK')
                ->unsigned();
            $table->integer('intTimesADay');
            $table->time('timeInterval');
            $table->integer('intUnitOfMeasurementIdFK')
                ->unsigned();
            $table->timestamps();

            $table->foreign('intPrescriptionDetailIdFK')
                ->references('intPrescriptionDetailId')
                ->on('tblPrescriptionDetail')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('intMedicineIdFK')
                ->references('intItemId')
                ->on('tblItem')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('intUnitOfMeasurementIdFK')
                ->references('intUnitOfMeasurementId')
                ->on('tblUnitOfMeasurement')
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
        Schema::dropIfExists('tblPrescriptionMedicine');
    }
}
