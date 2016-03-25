<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuildingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblBuilding', function(Blueprint $table) {
            $table->increments('intBuildingId');
            $table->string('strBuildingName');
            $table->string('strBuildingLocation');
            $table->string('strBuildingDesc');
            $table->integer('intBuildingStatus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblBuilding');
    }
}
