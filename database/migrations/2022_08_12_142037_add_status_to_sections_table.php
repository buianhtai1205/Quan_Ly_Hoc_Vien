<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToSectionsTable extends Migration
{
    public function up(): void
    {
        Schema::table('sections', static function (Blueprint $table) {
            $table->string('status')->default(0)->after('limit');
        });
    }

    public function down(): void
    {
        Schema::table('sections', static function (Blueprint $table) {
            //
        });
    }
}
