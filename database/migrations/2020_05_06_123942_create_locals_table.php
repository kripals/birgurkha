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
            $table->increments('id');
            $table->string('entity_id', 225);
            $table->enum('magento_type', ['PRODUCT', 'CATEGORY', 'CMS_PAGE', 'URL_KEY', 'SEARCH'])->default('PRODUCT');
            $table->string('name');
            $table->integer('position')->nullable();
            $table->integer('type_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('locals', function($table) {
            $table->foreign('type_id')
                ->references('id')
                ->on('types')
                ->onDelete('cascade');
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
