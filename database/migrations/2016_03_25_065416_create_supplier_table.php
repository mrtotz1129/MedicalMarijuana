<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupplierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblSupplier', function(Blueprint $table) {
            $table->increments('intSupplierId');
            $table->string('strSupplierName', 100);
            $table->string('strSupplierAddress');
            $table->string('strSupplierContactNo');
            $table->integer('intStatus');
            $table->timestamps();

            $table->unique('strSupplierName');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblSupplier');
    }
}
