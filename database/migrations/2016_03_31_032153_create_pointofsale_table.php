<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePointofsaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblPointOfSale', function(Blueprint $table){
            $table->increments('intPointOfSaleId');
            $table->integer('intEmployeeIdFK')
                ->unsigned();
            $table->timestamps();
            $table->decimal('deciAmountPaid', 8, 2);

            $table->foreign('intEmployeeIdFK')
                ->references('intEmployeeId')
                ->on('tblEmployee')
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
        Schema::dropIfExists('tblPointOfSale');
    }
}
