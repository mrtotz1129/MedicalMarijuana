<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblEquipment', function(Blueprint $table) {
            $table->increments('intEquipmentId');
            $table->char('strEquipmentCode', 15);
            $table->integer('intEquipmentCategoryIdFK')
                ->unsigned();
            $table->integer('intRoomIdFK')
                ->unsigned();
            $table->integer('intSupplierIdFK')
                ->unsigned();
            $table->timestamps();
            $table->integer('intStatus');

            $table->foreign('intEquipmentCategoryIdFK')
                ->references('intEquipmentCategoryId')
                ->on('tblEquipmentCategory')
                ->onUpdate('cascade');

            $table->foreign('intRoomIdFK')
                ->references('intRoomId')
                ->on('tblRoom')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('intSupplierIdFK')
                ->references('intSupplierId')
                ->on('tblSupplier')
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
        Schema::dropIfExists('tblEquipment');
    }
}
