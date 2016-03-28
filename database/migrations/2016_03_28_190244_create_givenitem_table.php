<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGivenitemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblGivenItem', function(Blueprint $table){
            $table->integer('intGivenIdFK')
                ->unsigned();
            $table->integer('intItemIdFK')
                ->unsigned();
            $table->integer('intQuantity')
                ->nullable();
            $table->double('dblDosage')
                ->nullable();
            $table->integer('intUnitOfMeasurementIdFK')
                ->unsigned();
            $table->timestamps();

            $table->foreign('intGivenIdFK')
                ->references('intGivenId')
                ->on('tblGiven')
                ->onUpdate('cascade')
                ->onDelete('restrict');

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

            $table->unique(['intGivenIdFK',
                            'intItemIdFK',
                            'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblGivenItem');
    }
}
