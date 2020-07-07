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
            $table->text('entity_id');
            $table->enum('magento_type', ['PRODUCT', 'CATEGORY', 'CMS_PAGE', 'WEB_PAGE', 'SEARCH'])->default('PRODUCT');
            $table->string('name');
            $table->integer('position')->nullable();
            $table->integer('type_id')->unsigned();
            $table->text('category_color')->nullable();
            $table->text('description_text')->nullable();
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
