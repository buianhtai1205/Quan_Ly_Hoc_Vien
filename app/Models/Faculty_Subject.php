<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Faculty_Subject extends Model
{
    use HasFactory;
    protected $fillable = [
        'facultyID',
        'subjectID',
    ];
    protected $table = 'faculty_subject';

    public function faculty(): BelongsTo
    {
        return $this->belongsTo(Faculty::class, 'facultyID', 'facultyID');
    }

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class, 'subjectID', 'subjectID');
    }
}
