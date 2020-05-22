<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locals', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('entity_id', 225);
            $table->enum('magento_type', ['PRODUCT', 'CATEGORY'])->default('PRODUCT');
            $table->string('name');
            $table->enum('type', ['SLIDER','CATEGORY','PRODUCT'])->default('SLIDER');
            $table->integer('position')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locals');
    }
}
