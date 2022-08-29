<?php

namespace Tests\Feature;

use App\Models\EmptyRoom;
use App\Models\RegisterTeaching;
use App\Models\Section;
use App\Models\Section_Student;
use App\Models\Subject;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_example()
    {
        $schoolYear = '2022';
        $semester = '1';
        $schoolYearTwoLetter = substr($schoolYear, -2, 2);
        $sectionIDHead = $schoolYearTwoLetter . $semester;

        // get list subject
        $subjects = Subject::get();

        $numArea = 3;

        $arrayTest = [];
        $index = 0;

        foreach ($subjects as $subject)
        {
            $area = 'A';
            if ($subject->id % $numArea === 1)
            {
                $area = 'B';
            }

            if ($subject->id % $numArea === 2)
            {
                $area = 'C';
            }

            $sections = Section::where('sectionID', "LIKE", "$sectionIDHead%")
                ->where('subjectID', $subject->subjectID)->get();
            $countSections = $sections->count();

            $registers = RegisterTeaching::where('schoolYear', $schoolYear)
                ->where('semester', $semester)
                ->where('subjectID', $subject->subjectID)
                ->orderBy('numOfSection', 'desc')
                ->get();
            $countRegisters = $registers->count();

            $flag = 0;
            $registerIndex = 0;

            for ($i = 0; $i < $countSections; $i++)
            {
                if ($registerIndex === $countRegisters)
                {
                    $registerIndex = 0;
                    $flag++;
                }

                while($registers[$registerIndex]->numOfSection <= $flag)
                {
                    $registerIndex++;

                    if ($registerIndex === $countRegisters)
                    {
                        $registerIndex = 0;
                        $flag++;
                    }
                }
                $emptyRoom = EmptyRoom::where('roomName', 'LIKE', "$area%")
                    ->where('status', '0')->get()->random(1);

                $sections[$i]->update([
                    'teacherID' => $registers[$registerIndex]->teacherID,
                    'room' => $emptyRoom[0]->roomName,
                    'shift' => $emptyRoom[0]->shift,
                    'beginDate' => $emptyRoom[0]->beginDate,
                ]);
                $emptyRoom[0]->update([
                    'status' => '1',
                ]);


                $arrayTest[$index] = $registerIndex;
                $index++;

                $registerIndex++;
            }

        }

        return $arrayTest;
    }

    public function test_queue_handle()
    {
        $section_students = Section_Student::get();
        $arrDate = [];
        foreach ($section_students as $section_student) {
            $id = $section_student->id;
            $date = $section_student->section->beginDate;
            $numOfLesson = $section_student->section->numOfLesson;
            for ($i = 0 ; $i < $numOfLesson; $i++) {
                $arrDate[$i] = $date;
                $date = date('Y-m-d', strtotime($date . ' +7 day'));
            }
            return $arrDate;
        }

    }
}
