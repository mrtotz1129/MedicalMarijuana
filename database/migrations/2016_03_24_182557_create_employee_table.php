<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblEmployee', function(Blueprint $table) {
            $table->increments('intEmployeeId');
            $table->string('strFirstName', 100);
            $table->string('strMiddleName', 100)
                ->nullable();
            $table->string('strLastName', 100);
            $table->string('strGender', 10);
            $table->string('strContactNo', 15);
            $table->string('strAddress');
            $table->integer('intPositionIdFK')
                ->unsigned();
            $table->integer('intStatus');
            $table->timestamps();

            $table->unique(['strFirstName', 'strMiddleName', 'strLastName'], 'uq_employee_name');
            $table->foreign('intPositionIdFK')
                ->references('intPositionId')
                ->on('tblPosition')
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
        Schema::dropIfExists('tblEmployee');
    }
}
