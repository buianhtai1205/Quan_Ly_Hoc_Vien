<?php

namespace App\Jobs;

use App\Models\Section;
use App\Models\Section_Student;
use App\Models\Student;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ProcessAddStudentsToSections implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $arrSection_StudentClass;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(array $arrSection_StudentClass)
    {
        $this->arrSection_StudentClass = $arrSection_StudentClass;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $sections = Section::select('sectionID')->get();
        foreach ($sections as $section)
        {
            $sectionID = $section->sectionID;
            $listClasses = $this->arrSection_StudentClass[$sectionID];
            foreach ($listClasses as $class)
            {
               $students = Student::select('studentID')
                   ->where('classID', $class)->get();
               foreach ($students as $student)
               {
                   Section_Student::create([
                       'sectionID' => $sectionID,
                       'studentID' => $student->studentID,
                   ]);
               }
            }
        }
    }
}
