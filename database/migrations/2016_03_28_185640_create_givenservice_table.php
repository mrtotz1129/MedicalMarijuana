<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGivenserviceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblGivenService', function(Blueprint $table){
            $table->integer('intGivenIdFK')
                ->unsigned();
            $table->integer('intServiceIdFK')
                ->unsigned();
            $table->text('txtFinding');
            $table->text('txtResult');
            $table->integer('intMachineResultIdFK')
                ->unsigned();
            $table->timestamps();

            $table->foreign('intGivenIdFK')
                ->references('intGivenId')
                ->on('tblGiven')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('intMachineResultIdFK')
                ->references('intMachineResultId')
                ->on('tblMachineResult')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->unique(['intGivenIdFK',
                            'intServiceIdFK',
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
        Schema::dropIfExists('tblGivenService');
    }
}
