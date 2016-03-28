<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFloorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblFloor', function(Blueprint $table) {
            $table->increments('intFloorId');
            $table->integer('intBuildingIdFK')
                ->unsigned();
            $table->integer('intFloorDesc');
            $table->timestamps();

            $table->foreign('intBuildingIdFK')
                ->references('intBuildingId')
                ->on('tblBuilding')
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
        Schema::dropIfExists('tblFloor');
    }
}
