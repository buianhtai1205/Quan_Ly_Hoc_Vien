<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education_programs', function (Blueprint $table) {
            $table->id();
            $table->string('courseID');
            $table->string('facultyID');
            $table->string('semester');
            $table->string('subjectName');
            $table->foreign('courseID')->references('courseID')->on('courses');
            $table->foreign('facultyID')->references('facultyID')->on('faculties');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('education_programs');
    }
}
