<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePositionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblPosition', function(Blueprint $table) {
            $table->increments('intPositionId');
            $table->string('strPositionDesc');
            $table->integer('intStatus');
            $table->timestamps();

            $table->unique('strPositionDesc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblPosition');
    }
}
