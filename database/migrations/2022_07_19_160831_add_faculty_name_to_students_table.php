<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFacultyNameToStudentsTable extends Migration
{

    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->string('facultyName')->nullable()->after('fullName');
        });
    }

    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn('facultyName');
        });
    }
}
