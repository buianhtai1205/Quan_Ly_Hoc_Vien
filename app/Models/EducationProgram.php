<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EducationProgram extends Model
{
    use HasFactory;
    protected $fillable = [
        'courseID',
        'facultyID',
        'semester',
        'subjectName'
    ];
    protected $table = 'education_programs';
    public $timestamps = false;

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class, 'courseID', 'courseID');
    }

    public function faculty(): BelongsTo
    {
        return $this->belongsTo(Faculty::class, 'facultyID', 'facultyID');
    }
}
