<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Section_Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'sectionID',
        'studentID'
    ];
    protected $table = 'section_student';

    public function section(): BelongsTo
    {
        return $this->belongsTo(Section::class, 'sectionID', 'sectionID');
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'studentID', 'studentID');
    }
}
