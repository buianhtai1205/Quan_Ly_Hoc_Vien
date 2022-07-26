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
}
