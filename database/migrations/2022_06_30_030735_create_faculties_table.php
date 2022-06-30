<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacultiesTable extends Migration
{
    public function up()
    {
        Schema::create('faculties', function (Blueprint $table) {
            $table->id();
            $table->string('facultyID', 50)->unique()->nullable(false);
            $table->string('facultyName', '50');
            $table->timestamps();
            $table->softDeletes(); // add
        });
    }

    public function down()
    {
        Schema::dropIfExists('faculties');
    }
}
