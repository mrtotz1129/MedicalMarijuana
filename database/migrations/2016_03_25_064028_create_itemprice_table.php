<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItempriceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblItemPrice', function(Blueprint $table) {
            $table->increments('intItemPrice');
            $table->integer('intItemIdFK')
                ->unsigned();
            $table->decimal('deciItemPrice', 6, 2);
            $table->dateTime('datAsOf');

            $table->foreign('intItemIdFK')
                ->references('intItemId')
                ->on('tblItem')
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
        Schema::dropIfExists('tblItemPrice');
    }
}
