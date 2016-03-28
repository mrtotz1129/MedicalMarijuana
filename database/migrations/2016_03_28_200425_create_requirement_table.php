<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequirementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblRequirement', function(Blueprint $table){
            $table->increments('intRequirementId');
            $table->string('strRequirementName');
            $table->text('txtRequirementDesc');
            $table->integer('intRequirementStatus');
            $table->timestamps();

            $table->unique('strRequirementName');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblRequirement');
    }
}
