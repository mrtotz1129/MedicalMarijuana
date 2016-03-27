<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransferroomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblTransferRoom', function(Blueprint $table) {
            $table->increments('intTransferRoomId');
            $table->integer('intPatientIdFK')
                ->unsigned();
            $table->integer('intFromRoomIdFK')
                ->unsigned();
            $table->integer('intToRoomIdFK')
                ->unsigned();
            $table->dateTime('datTransferRoom');
            $table->string('strRemarks');
            $table->integer('intTransferRoomStatusIdFK')
                ->unsigned();

            $table->foreign('intPatientIdFK')
                ->references('intPatientId')
                ->on('tblPatient')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('intFromRoomIdFK')
                ->references('intRoomId')
                ->on('tblRoom')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('intToRoomIdFK')
                ->references('intRoomId')
                ->on('tblRoom')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('intTransferRoomStatusIdFK')
                ->references('intStatusId')
                ->on('tblStatus')
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
        Schema::dropIfExists('tblTransferRoom');
    }
}
