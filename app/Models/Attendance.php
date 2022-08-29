<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attendance extends Model
{
    use HasFactory;
    protected $fillable = [
        'section_student_id',
        'date',
        'status',
    ];
    protected $table = 'attendances';
    public function section_student(): BelongsTo
    {
        return $this->belongsTo(Section_Student::class, 'section_student_id', 'id');
    }
}
