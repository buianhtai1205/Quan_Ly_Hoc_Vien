<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('email', 50);
            $table->string('password', 200);
            $table->string('fullName', 100);
            $table->Date('birthDate');
            $table->enum("gender", ["male", "female", "others"]);
            $table->string('address', 200);
            $table->string('phoneNumber', 15);
            $table->string('avatar');
            $table->enum('level', ["Master", "PhD", "Asscociate Professor", "Professor"]);
            $table->string('faculty', 100);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('teachers');
    }
}
