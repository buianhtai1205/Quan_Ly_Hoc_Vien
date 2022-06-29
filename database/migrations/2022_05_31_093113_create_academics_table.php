<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academics', function (Blueprint $table) {
            $table->id();
            $table->string('academicID', 50)->unique()->nullable(false);
            $table->string('password', 200);
            $table->string('fullName', 100);
            $table->Date('birthDate');
            $table->enum("gender", ["male", "female", "others"]);
            $table->string('address', 200);
            $table->string('phoneNumber', 15);
            $table->string('avatar');
            $table->timestamps();
            $table->softDeletes(); // add
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('academics');
    }
}
