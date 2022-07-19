<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Student extends Model
{
    use HasFactory;
    use Notifiable,
        SoftDeletes;// add soft delete
    protected $fillable = [
        'classID',
        'studentID',
        'password',
        'fullName',
        'facultyName',
        'birthDate',
        'gender',
        'address',
        'phoneNumber',
        'avatar'
    ];
}
