<?php

namespace App\Jobs;

use App\Models\Attendance;
use App\Models\Section_Student;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessGenerateAttendances implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        $section_students = Section_Student::get();
        foreach ($section_students as $section_student) {
            $id = $section_student->id;
            $date = $section_student->section->beginDate;
            $numOfLesson = $section_student->section->numOfLesson;
            for ($i = 0 ; $i < $numOfLesson; $i++) {
                Attendance::create([
                    'section_student_id' => $id,
                    'date' => $date,
                ]);
                $date = date('Y-m-d', strtotime($date . ' +7 day'));
            }
        }
    }
}
