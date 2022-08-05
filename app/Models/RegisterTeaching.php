<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RegisterTeaching extends Model
{
    use HasFactory;
    protected $fillable = [
        'teacherID',
        'subjectID',
        'numOfSection',
        'schoolYear',
        'semester',
    ];
    protected $table = 'register_teaching';
    public $timestamps = false;

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class, 'teacherID', 'teacherID');
    }

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class, 'subjectID', 'subjectID');
    }

    public static function registerTeaching(
        $schoolYear,
        $semester,
        $subjectIDs,
        $numOfSections,
        $teacherID
    ): void {
        $count = count($subjectIDs);

        for ($i = 0; $i < $count; $i++)
        {
            if ($numOfSections[$i] > 0)
            {
                self ::create([
                    'teacherID' => $teacherID,
                    'subjectID' => $subjectIDs[$i],
                    'numOfSection' => $numOfSections[$i],
                    'schoolYear' => $schoolYear,
                    'semester' => $semester,
                ]);
            }
        }
    }
}
