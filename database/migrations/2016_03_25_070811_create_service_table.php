<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblService', function(Blueprint $table) {
            $table->increments('intServiceId');
            $table->string('strServiceDesc');
            $table->integer('intDepartmentIdFK')
                ->unsigned();
            $table->integer('intServiceStatus');

            $table->foreign('intDepartmentIdFK')
                ->references('intDepartmentId')
                ->on('tblDepartment')
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
        Schema::dropIfExists('tblService');
    }
}
