<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmptyRoom extends Model
{
    use HasFactory;
    protected $fillable = [
        'roomName',
        'shift',
        'beginDate',
        'status',
    ];
    protected $table = 'empty_rooms';
    public $timestamps = false;

    public static function getAreaRoom($flagID, $numArea) : string
    {
        $area = 'A';
        if ($flagID % $numArea === 1)
        {
            $area = 'B';
        }

        if ($flagID % $numArea === 2)
        {
            $area = 'C';
        }

        return $area;
    }
}
