<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBilleditemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblBilledItem', function(Blueprint $table){
            $table->increments('intBilledItemId');
            $table->integer('intAdmissionIdFK')
                ->unsigned();
            $table->integer('intItemIdFK')
                ->unsigned();
            $table->integer('intQuantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblBilledItem');
    }
}
