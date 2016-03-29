<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoompriceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblRoomPrice', function(Blueprint $table) {
            $table->increments('intRoomPriceId');
            $table->integer('intRoomIdFK')
                ->unsigned();
            $table->decimal('deciRoomPrice', 8, 2);
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
        Schema::dropIfExists('tblRoomPrice');
    }
}
