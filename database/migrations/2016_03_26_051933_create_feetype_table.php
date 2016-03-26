<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeetypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblFeeType', function(Blueprint $table) {
            $table->increments('intFeeTypeId');
            $table->string('strFeeTypeName', 100);
            $table->integer('intStatus');
            $table->timestamps();

            $table->unique('strFeeTypeName');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblFeeType');
    }
}
