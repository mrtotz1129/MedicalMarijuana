<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblItem', function(Blueprint $table) {
            $table->increments('intItemId');
            $table->string('strItemName');
            $table->integer('intItemCategoryIdFK')
                ->unsigned();
            $table->integer('intGenericNameIdFK')
                ->unsigned();
            // $table->integer('intDepartmentIdFK')
            //     ->unsigned();
            $table->text('txtImagePath')
                ->nullable();
            $table->integer('intItemStatus');
            $table->timestamps();

            $table->foreign('intItemCategoryIdFK')
                ->references('intItemCategoryId')
                ->on('tblItemCategory')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('intGenericNameIdFK')
                ->references('intGenericNameId')
                ->on('tblGenericName')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            // $table->foreign('intDepartmentIdFK')
            //     ->references('intDepartmentId')
            //     ->on('tblDepartment')
            //     ->onUpdate('cascade')
            //     ->onDelete('restrict');

            $table->unique('strItemName');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblItem');
    }
}
