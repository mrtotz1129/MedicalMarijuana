<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBilledserviceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblBilledService', function(Blueprint $table){
            $table->increments('intBilledServiceId');
            $table->integer('intAdmissionIdFK')
                ->unsigned();
            $table->integer('intServiceIdFK')
                ->unsigned();
            $table->integer('intServicePriceIdFK')
                ->unsigned();
            $table->timestamps();

            $table->foreign('intAdmissionIdFK')
                ->references('intAdmissionId')
                ->on('tblAdmission')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('intServiceIdFK')
                ->references('intServiceId')
                ->on('tblService')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('intServicePriceIdFK')
                ->references('intServicePriceId')
                ->on('tblServicePrice')
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
        Schema::dropIfExists('tblBilledService');
    }
}
