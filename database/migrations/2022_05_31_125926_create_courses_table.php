<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{

    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('courseID', 50)->unique()->nullable(false);
            $table->string('courseName', 50);
            $table->integer('beginYear');
            $table->integer('endYear');
            $table->timestamps();
            $table->softDeletes(); // add
        });
    }

    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
