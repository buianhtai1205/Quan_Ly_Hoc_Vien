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
    protected $primaryKey = ['teacherID', 'subjectID'];
    public $incrementing = false;

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class, 'teacherID', 'teacherID');
    }

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class, 'subjectID', 'subjectID');
    }

    public static function registerTeaching(
        string $schoolYear,
        string $semester,
        array $subjectIDs,
        array $numOfSections,
        string $teacherID
    ): void {

        $count = count($subjectIDs);

        for ($i = 0; $i < $count; $i++)
        {
            if ((int)$numOfSections[$i] > 0)
            {
                self ::create([
                    'teacherID' => $teacherID,
                    'subjectID' => (string)$subjectIDs[$i],
                    'numOfSection' => (string)$numOfSections[$i],
                    'schoolYear' => $schoolYear,
                    'semester' => $semester,
                ]);
            }
        }
    }
}
