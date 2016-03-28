<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomtypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblRoomType', function(Blueprint $table) {
            $table->increments('intRoomTypeId');
            $table->string('strRoomTypeDesc');
            $table->timestamps();

            $table->unique('strRoomTypeDesc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblRoomType');
    }
}
