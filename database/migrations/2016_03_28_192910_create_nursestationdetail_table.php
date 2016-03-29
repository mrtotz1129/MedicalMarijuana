<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNursestationdetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblNurseStationDetail', function(Blueprint $table){
            $table->integer('intNurseStationIdFK')
                ->unsigned();
            $table->integer('intNurseIdFK')
                ->unsigned();
            $table->integer('intNurseStatus');

            $table->foreign('intNurseStationIdFK')
                ->references('intNurseStationId')
                ->on('tblNurseStation')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('intNurseIdFK')
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
        Schema::dropIfExists('tblNurseStationDetail');
    }
}
