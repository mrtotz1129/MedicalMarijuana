<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicepriceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblServicePrice', function(Blueprint $table) {
            $table->increments('intServicePriceId');
            $table->integer('intServiceIdFK')
                ->unsigned();
            $table->decimal('deciServicePrice', 8, 2);
            $table->timestamps();

            $table->foreign('intServiceIdFK')
                ->references('intServiceId')
                ->on('tblService')
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
        Schema::dropIfExists('tblServicePrice');
    }
}
