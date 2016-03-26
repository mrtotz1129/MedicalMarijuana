<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipmentcategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblEquipmentCategory', function(Blueprint $table) {
            $table->increments('intEquipmentCategoryId');
            $table->string('strEquipmentCatName', 100);
            $table->text('txtEquipmentDesc');
            $table->integer('intStatus');
            $table->timestamps();

            $table->unique('strEquipmentCatName');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblEquipmentCategory');
    }
}
