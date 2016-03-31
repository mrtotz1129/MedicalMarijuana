<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePointofsalediscountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblPointOfSaleDiscount', function(Blueprint $table){
            $table->integer('intPointOfSaleIdFK')
                ->unsigned();
            $table->integer('intDiscountIdFK')
                ->unsigned();

            $table->foreign('intPointOfSaleIdFK')
                ->references('intPointOfSaleId')
                ->on('tblPointOfSale')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('intDiscountIdFK')
                ->references('intDiscountId')
                ->on('tblDiscount')
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
        Schema::dropIfExists('tblPointOfSaleDiscount');
    }
}
