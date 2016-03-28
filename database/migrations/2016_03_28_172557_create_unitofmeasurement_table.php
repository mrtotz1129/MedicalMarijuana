<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitofmeasurementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblUnitOfMeasurement', function(Blueprint $table){
            $table->increments('intUnitOfMeasurementId');
            $table->string('strUnitOfMeasurementName');
            $table->string('strUnitOfMeasurementAbbrev');
            $table->double('dblEquivalent');
            $table->timestamps();

            $table->unique('strUnitOfMeasurementName');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblUnitOfMeasurement');
    }
}
