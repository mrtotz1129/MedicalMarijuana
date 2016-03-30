<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrescriptionserviceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblPrescriptionService', function(Blueprint $table){
            $table->integer('intPrescriptionDetailIdFK')
                ->unsigned();
            $table->integer('intServiceIdFK')
                ->unsigned();
            $table->text('txtRemarks')
                ->nullable();
            $table->timestamps();

            $table->foreign('intPrescriptionDetailIdFK')
                ->references('intPrescriptionDetailId')
                ->on('tblPrescriptionDetail')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('intServiceIdFK')
                ->references('intServiceId')
                ->on('tblService')
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
        Schema::dropIfExists('tblPrescriptionService');
    }
}
