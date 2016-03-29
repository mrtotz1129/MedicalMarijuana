<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblBed', function(Blueprint $table) {
            $table->increments('intBedId');
            $table->integer('intRoomIdFK')
                ->unsigned();
            $table->integer('intBedStatus');
            $table->timestamps();

            $table->foreign('intRoomIdFK')
                ->references('intRoomId')
                ->on('tblRoom')
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
        Schema::dropIfExists('tblBed');
    }
}
