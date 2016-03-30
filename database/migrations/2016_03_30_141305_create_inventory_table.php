<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblInventory', function(Blueprint $table){
            $table->increments('intInventoryId');
            $table->integer('intItemIdFK')
                ->unsigned();
            $table->integer('intUnitOfMeasurementIdFK')
                ->unsigned():
            $table->decimal('deciPrevValue', 8, 2);
            $table->decimal('deciAfterValue', 8, 2);
            $table->string('strReason');
            $table->timestamps();

            $table->foreign('intItemIdFK')
                ->references('intItemId')
                ->on('tblItem')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('intUnitOfMeasurementIdFK')
                ->references('intUnitOfMeasurementId')
                ->on('tblUnitOfMeasurement')
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
        Schema::dropIfExists('tblInventory');
    }
}
