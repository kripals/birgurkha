<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInnerLandingColumnLandingPageEntitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('landing_page_entities', function (Blueprint $table) {
            $table->integer('inner_landing_page')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('landing_page_entities', function (Blueprint $table) {
            $table->integer('inner_landing_page')->unsigned()->nullable();
        });
    }
}
