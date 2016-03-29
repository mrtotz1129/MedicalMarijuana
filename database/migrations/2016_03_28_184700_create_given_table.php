<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGivenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblGiven', function(Blueprint $table){
            $table->increments('intGivenId');
            $table->integer('intAdmissionIdFK')
                ->unsigned();
            $table->integer('intGivenTypeId');
            $table->timestamps();

            $table->foreign('intAdmissionIdFK')
                ->references('intAdmissionId')
                ->on('tblAdmission')
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
        Schema::dropIfExists('tblGiven');
    }
}
