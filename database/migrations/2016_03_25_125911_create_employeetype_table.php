<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeetypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblEmployeeType', function(Blueprint $table) {
            $table->increments('intEmployeeTypeId');
            $table->string('strPosition');
            $table->integer('intStatus');
            $table->timestamps();

            $table->unique('strPosition');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblEmployeeType');
    }
}
