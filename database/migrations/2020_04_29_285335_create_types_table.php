<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('types', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('section', 225);
            $table->string('name', 225)->nullable();
            $table->tinyInteger('visible');
            $table->integer('position')->nullable();
            $table->enum('type', ['SLIDER', 'CAROUSEL', 'BANNER', 'DEALS', 'CATEGORY'])->default('BANNER');
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->string('add_on_words')->nullable();
            $table->string('background_color')->nullable();
            $table->tinyInteger('view_all_buttons')->nullable();
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
        Schema::dropIfExists('types');
    }
}
