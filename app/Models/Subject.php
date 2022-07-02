<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Subject extends Model
{
    use HasFactory;
    use Notifiable,
        SoftDeletes;// add soft delete
    protected $fillable = [
        'subjectID',
        'subjectName',
        'numOfCredits',
    ];

    public function faculties(): BelongsToMany
    {
        //https://laracasts.com/discuss/channels/laravel/no-id-column-for-many-to-many
        // use column subjectID and facultyID instead of id column default
        return $this->belongsToMany(Faculty::class, 'faculty_subject','subjectID',
            'facultyID','subjectID', 'facultyID');
    }
}
