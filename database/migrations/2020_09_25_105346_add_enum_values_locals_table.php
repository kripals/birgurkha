<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEnumValuesLocalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
                            ALTER TABLE locals MODIFY magento_type 
                            ENUM('PRODUCT','CATEGORY','CMS_PAGE','WEB_PAGE','GENERIC','DEFAULT') NOT NULL
                        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("
                                ALTER TABLE locals MODIFY magento_type 
                                ENUM('PRODUCT','CATEGORY','CMS_PAGE','WEB_PAGE','SEARCH') NOT NULL
                            ");
    }
}
