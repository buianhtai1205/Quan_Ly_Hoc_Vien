<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Faculty extends Model
{
    use HasFactory;
    use Notifiable,
        SoftDeletes;// add soft delete
    protected $fillable = [
        'facultyID',
        'facultyName',
    ];

    public function subjects(): BelongsToMany
    {
        //https://laracasts.com/discuss/channels/laravel/no-id-column-for-many-to-many
        // use column subjectID and facultyID instead of id column default
        return $this->belongsToMany(Subject::class, 'faculty_subject', 'subjectID',
            'facultyID','facultyID', 'subjectID');
    }
}
