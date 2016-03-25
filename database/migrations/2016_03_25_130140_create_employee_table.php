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
            $table->text('txtImagePath')
                ->nullable();
            $table->string('strFirstName', 100);
            $table->string('strMiddleName', 100)
                ->nullable();
            $table->string('strLastName', 100);
            $table->date('dateBirthday');
            $table->string('strGender', 10);
            $table->string('strContactNum', 15)
                ->nullable();
            $table->string('strEmail');
            $table->string('strAddress');
            $table->integer('intEmployeeIdFK')
                ->unsigned();
            $table->integer('intStatus');
            $table->timestamps();

            $table->unique(['strFirstName', 'strMiddleName', 'strLastName'], 'uq_employee_name');
            $table->unique('strEmail');
            $table->foreign('intEmployeeIdFK')
                ->references('intEmployeeTypeId')
                ->on('tblEmployeeType')
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
