<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePointofsaledetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblPointOfSaleDetail', function(Blueprint $table){
            $table->integer('intPointOfSaleIdFK')
                ->unsigned();
            $table->integer('intItemIdFK')
                ->unsigned();
            $table->integer('intQuantity');
            $table->integer('intItemPriceIdFK')
                ->unsigned();

            $table->foreign('intPointOfSaleIdFK')
                ->references('intPointOfSaleId')
                ->on('tblPointOfSale')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('intItemPriceIdFK')
                ->references('intItemPriceId')
                ->on('tblItemPrice')
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
        Schema::dropIfExists('tblPointOfSaleDetail');
    }
}
