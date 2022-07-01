<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentclassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studentclasses', function (Blueprint $table) {
            $table->id();
            $table->string('classID')->unique()->nullable(false);
            $table->string('courseID');
            $table->string('facultyID');
            $table->string('className', 50);
            $table->timestamps();
            $table->softDeletes(); // add
            $table->foreign('courseID')->references('courseID')->on('courses')->onDelete('cascade');
            $table->foreign('facultyID')->references('facultyID')->on('faculties')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('studentclasses');
    }
}
