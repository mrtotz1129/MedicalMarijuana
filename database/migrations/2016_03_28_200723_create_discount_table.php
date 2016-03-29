<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblDiscount', function(Blueprint $table){
            $table->increments('intDiscountId');
            $table->string('strDiscountName');
            $table->text('txtDiscountDesc');
            $table->integer('intDiscountStatus');
            $table->integer('intDiscountTypeId');
            $table->double('dblDiscountPercent');
            $table->double('dblDiscountAmount');
            $table->timestamps();

            $table->unique('strDiscountName');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblDiscount');
    }
}
