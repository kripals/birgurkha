<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLandingPageEnumValueLandingPageTable extends Migration
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
                            ENUM('PRODUCT','CATEGORY','CMS_PAGE','WEB_PAGE','GENERIC','DEFAULT','LANDING_PAGE') NOT NULL
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
                            ENUM('PRODUCT','CATEGORY','CMS_PAGE','WEB_PAGE','GENERIC','DEFAULT') NOT NULL
                        ");
    }
}
