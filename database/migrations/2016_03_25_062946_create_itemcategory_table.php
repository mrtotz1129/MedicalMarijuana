<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemcategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblItemCategory', function(Blueprint $table) {
            $table->increments('intItemCategoryId');
            $table->string('strItemCategoryDesc');
            $table->timestamps();

            $table->unique('strItemCategoryDesc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblItemCategory');
    }
}
