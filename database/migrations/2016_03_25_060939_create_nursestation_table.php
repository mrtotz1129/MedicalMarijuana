<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNursestationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblNurseStation', function(Blueprint $table) {
            $table->increments('intNurseStationId');
            $table->integer('intFloorIdFK')
                ->unsigned();
            $table->integer('intFloorStatus');
            $table->timestamps();

            $table->foreign('intFloorIdFK')
                ->references('intFloorId')
                ->on('tblFloor')
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
        Schema::dropIfExists('tblNurseStation');
    }
}
