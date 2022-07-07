<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->string('sectionID')
                ->unique()->nullable(false);
            $table->string('subjectID');
            $table->string('classID')->nullable(true);
            $table->string('teacherID')->nullable(true);
            $table->string('typeSection', 20);
            $table->integer('shift');
            $table->string('room', 20);
            $table->date('beginDate');
            $table->integer('numOfLesson');
            $table->string('limit');
            $table->timestamps();
            $table->softDeletes(); // add
            $table->foreign('subjectID')
                ->references('subjectID')
                ->on('subjects')
                ->onDelete('cascade');
            $table->foreign('classID')
                ->references('classID')
                ->on('studentclasses')
                ->onDelete('cascade');
            $table->foreign('teacherID')
                ->references('teacherID')
                ->on('teachers')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sections');
    }
}
