<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblFee', function(Blueprint $table) {
            $table->increments('intFeeId');
            $table->string('strFeeName', 100);
            $table->text('txtFeeDesc')
                ->nullable();
            $table->double('dblPrice');
            $table->integer('intFeeTypeIdFK')
                ->unsigned();
            $table->integer('intStatus');
            $table->timestamps();

            $table->unique('strFeeName');

            $table->foreign('intFeeTypeIdFK')
                ->references('intFeeTypeId')
                ->on('tblFeeType')
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
        Schema::dropIfExists('tblFee');
    }
}
