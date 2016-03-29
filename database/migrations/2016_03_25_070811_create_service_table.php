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
            $table->string('strServiceName');
            $table->integer('intDepartmentIdFK')
                ->unsigned();
            $table->integer('intServiceStatus');

            $table->foreign('intDepartmentIdFK')
                ->references('intDepartmentId')
                ->on('tblDepartment')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->unique('strServiceName');
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
