<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('classID')->nullable(true);
            $table->string('studentID', 50)->unique()->nullable(false);
            $table->string('password', 200);
            $table->string('fullName', 50);
            $table->Date('birthDate');
            $table->enum('gender', ["male", "female", "others"]);
            $table->string('address', 200);
            $table->string('phoneNumber', 15);
            $table->string('avatar', 200);
            $table->timestamps();
            $table->softDeletes(); // add
            $table->foreign('classID')->references('classID')->on('studentclasses');
        });
    }

    public function down()
    {
        Schema::dropIfExists('students');
    }
}
