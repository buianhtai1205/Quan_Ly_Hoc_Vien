<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacultySubjectTable extends Migration
{

    public function up(): void
    {
        Schema::create('faculty_subject', static function (Blueprint $table) {
            $table->id();
            $table->string('facultyID');
            $table->string('subjectID');
            $table->timestamps();
            $table->foreign('facultyID')->references('facultyID')->on('faculties')->onDelete('cascade');
            $table->foreign('subjectID')->references('subjectID')->on('subjects')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('faculty_subject');
    }
}
