<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmptyRoomsTable extends Migration
{
    public function up(): void
    {
        Schema::create('empty_rooms', static function (Blueprint $table) {
            $table->id();
            $table->string('roomName', 10)->unique();
            $table->date('beginDate');
            $table->string('shift', 3);
            $table->string('status', 3);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('empty_rooms');
    }
}
