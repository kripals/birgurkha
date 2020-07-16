<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEntityTypeColumnTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('types', function (Blueprint $table) {
            $table->enum('entity_type', ['PRODUCT', 'CATEGORY', 'CMS_PAGE', 'WEB_PAGE', 'SEARCH'])->nullable()->after('entity_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('types', function (Blueprint $table) {
            $table->dropColumn('entity_type');
        });
    }
}
