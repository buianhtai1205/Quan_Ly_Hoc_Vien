<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Section extends Model
{
    use HasFactory;
    use Notifiable,
        SoftDeletes;// add soft delete

    protected $fillable = [
        'sectionID',
        'subjectID',
        'teacherID',
        'typeSection',
        'shift',
        'beginDate',
        'room',
        'numOfLesson',
        'limit',
    ] ;

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class, 'subjectID', 'subjectID');
    }
    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class, 'teacherID', 'teacherID');
    }

    public function createManySections($subjectID, $typeSection, $numOfLesson, $limit, $numOfSection, $schoolYear, $semester): void
    {
        // create sectionID:
        //ex: SchoolYear: 2022; Semester: 1; subjectID: LTPHP
        // -> sectionID: 22 1 LTPHP _01, _02,....
        $schoolYearTwoLetter = substr($schoolYear, -2, 2);
        $sectionIDHead = $schoolYearTwoLetter . $semester . $subjectID. "_";

        for ($i = 1; $i <= (int)$numOfSection; $i++)
        {
            $num_padded = sprintf("%02d", $i);
            $sectionID = $sectionIDHead . $num_padded;

            self::create([
                'sectionID' => $sectionID,
                'subjectID' => $subjectID,
                'typeSection' => $typeSection,
                'numOfLesson' => $numOfLesson,
                'limit' => $limit,
            ]);
        }
    }

    public function createAutomaticSections($typeSection, $numOfLesson, $limit, $numOfSection, $schoolYear, $semester): void
    {
        // get list subject
        $subjects = Subject::get();
        foreach ($subjects as $subject) {
            $subjectID = $subject->subjectID;
            // create section for one subject
            (new Section)->createManySections($subjectID, $typeSection, $numOfLesson,
                $limit, $numOfSection, $schoolYear, $semester);
        }
    }

    public static function checkForAssignment(
        $countRegisters,
        $registers,
        & $flag,
        & $registerIndex
    ) : void
    {
        //run through 1 round registers, return 0 for index, and increase flag
        if ($registerIndex === $countRegisters)
        {
            $registerIndex = 0;
            $flag++;
        }

        // check numOfSection teacher register, > flag => true
        while($registers[$registerIndex]->numOfSection <= $flag)
        {
            $registerIndex++;

            if ($registerIndex === $countRegisters)
            {
                $registerIndex = 0;
                $flag++;
            }
        }
    }

    public static function assignForOneSection(
        $area,
        $sections,
        $registers,
        $countRegisters,
        $i,
        & $flag,
        & $registerIndex
    ): void {
        self ::checkForAssignment(
            $countRegisters,
            $registers,
            $flag,
            $registerIndex
        );

        // get random room according to area
        $emptyRoom = EmptyRoom::where('roomName', 'LIKE', "$area%")
            ->where('status', '0')->get()->random(1);

        // assign to section
        $sections[$i]->update([
            'teacherID' => $registers[$registerIndex]->teacherID,
            'room' => $emptyRoom[0]->roomName,
            'shift' => $emptyRoom[0]->shift,
            'beginDate' => $emptyRoom[0]->beginDate,
        ]);
        $emptyRoom[0]->update([
            'status' => '1',
        ]);

        $registerIndex++;
    }

    public static function handleAssignmentForOneSubject(
        $schoolYear,
        $semester,
        $subject,
        $sectionIDHead,
        $numArea
    ): void {

        //get name area for student: A, B, C
        $area = EmptyRoom::getAreaRoom($subject->id, $numArea);

        $sections = self ::where('sectionID', "LIKE", "$sectionIDHead%")
            ->where('subjectID', $subject->subjectID)
            ->where('status', '0')->get();
        $countSections = $sections->count();

        $registers = RegisterTeaching::where('schoolYear', $schoolYear)
            ->where('semester', $semester)
            ->where('subjectID', $subject->subjectID)
            ->orderBy('numOfSection', 'desc')
            ->get();
        $countRegisters = $registers->count();

        // check numOfSection teacher register, > flag => true
        // ex: flag = 1, numOfSection = 1 => false
        $flag = 0;
        $registerIndex = 0;

        for ($i = 0; $i < $countSections; $i++)
        {
            self ::assignForOneSection(
                $area,
                $sections,
                $registers,
                $countRegisters,
                $i,
                $flag,
                $registerIndex
            );
        }
    }

    public static function handleAssignment($schoolYear, $semester): void
    {
        $schoolYearTwoLetter = substr($schoolYear, -2, 2);
        $sectionIDHead = $schoolYearTwoLetter . $semester;

        // get list subject
        $subjects = Subject::get();

        $numArea = 3;

        foreach ($subjects as $subject)
        {
            self ::handleAssignmentForOneSubject(
                $schoolYear,
                $semester,
                $subject,
                $sectionIDHead,
                $numArea
            );
        }
    }
}
