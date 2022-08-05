<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegisterTeachingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('register_teaching', function (Blueprint $table) {
            $table->string('teacherID');
            $table->string('subjectID');
            $table->string('numOfSection');
            $table->string('schoolYear');
            $table->string('semester');
            $table->foreign('teacherID')->references('teacherID')
                ->on('teachers')->onDelete('cascade');
            $table->foreign('subjectID')->references('subjectID')
                ->on('subjects')->onDelete('cascade');
            $table->primary(['teacherID', 'subjectID']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('register_teaching');
    }
}
