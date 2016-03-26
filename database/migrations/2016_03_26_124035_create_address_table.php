<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblAddress', function(Blueprint $table){
            $table->increments('intAddressId');
            $table->string('strAddress');
            $table->integer('intPatientIdFK')
                ->unsigned();

            $table->foreign('intPatientIdFK')
                ->references('intPatientId')
                ->on('tblPatient')
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
        Schema::dropIfExists('tblAddress');
    }
}
