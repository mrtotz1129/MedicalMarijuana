<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactnoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblContactNo', function(Blueprint $table) {
            $table->increments('intContactNoId');
            $table->string('strContactNo', 15);
            $table->integer('intPatientIdFK')
                ->unsigned();
            $table->integer('intStatus');
            $table->timestamps();
            

            $table->foreign('intPatientIdFK')
                ->references('intPatientId')
                ->on('tblPatient')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblContactNo');
    }
}
