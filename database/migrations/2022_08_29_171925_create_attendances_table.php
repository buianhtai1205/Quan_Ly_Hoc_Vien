<?php

use App\Enums\AttendanceStatusEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', static function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('section_student_id');
            $table->date('date');
            $table->string('status')->default(AttendanceStatusEnum::CHUA_DIEM_DANH);
            $table->timestamps();
            $table->foreign('section_student_id')->references('id')->on('section_student')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendances');
    }
}
