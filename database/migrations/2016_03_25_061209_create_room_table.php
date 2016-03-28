<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblRoom', function(Blueprint $table) {
            $table->increments('intRoomId');
            $table->integer('intRoomTypeIdFK')
                ->unsigned();
            $table->integer('intRoomStatus');
            $table->integer('intFloorIdFK')
                ->unsigned();
            $table->integer('intNurseStationIdFK')
                ->unsigned()
                ->nullable();
            $table->timestamps();

            $table->unique('strRoomName');

            $table->foreign('intRoomTypeIdFK')
                ->references('intRoomTypeId')
                ->on('tblRoomType')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('intNurseStationIdFK')
                ->references('intNurseStationId')
                ->on('tblNurseStation')
                ->onUpdate('cascade')
                ->onDelete('restrict');

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
        Schema::dropIfExists('tblRoom');
    }
}
