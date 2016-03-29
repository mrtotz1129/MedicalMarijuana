<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscountdetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblDiscountDetail', function(Blueprint $table){
            $table->integer('intDiscountIdFK')
                ->unsigned();
            $table->integer('intRequirementIdFK')
                ->unsigned();
            $table->integer('intStatus');

            $table->foreign('intDiscountIdFK')
                ->references('intDiscountId')
                ->on('tblDiscount')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('intRequirementIdFK')
                ->references('intRequirementId')
                ->on('tblRequirement')
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
        Schema::dropIfExists('tblDiscountDetail');
    }
}
