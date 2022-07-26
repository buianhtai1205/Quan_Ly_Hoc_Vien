<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropClassIDFromSectionsTable extends Migration
{
    public function up()
    {
        Schema::table('sections', function (Blueprint $table) {
            $table->dropForeign(['classID']);
            $table->dropColumn('classID');
        });
    }

    public function down()
    {
        Schema::table('sections', function (Blueprint $table) {
            //
        });
    }
}
