<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblAccount', function(Blueprint $table) {
            $table->increments('intAccountId');
            $table->string('strUsername');
            $table->string('strPassword', 32);
            $table->integer('intEmployeeIdFK')
                ->unsigned();
            $table->integer('intStatus');
            $table->timestamps();

            $table->unique('strUsername');
            $table->foreign('intEmployeeIdFK')
                ->references('intEmployeeId')
                ->on('tblEmployee')
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
        Schema::dropIfExists('tblAccount');
    }
}
