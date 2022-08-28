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

    public static function createArrayCheck(&$arrayResult, &$indexArrayResult): array
    {
        $arrayCheck = [];
        for ($i = 0; $i < $indexArrayResult; $i++)
        {
            foreach ($arrayResult[$i][1] as $jValue)
            {
                if (!array_key_exists($jValue -> classID, $arrayCheck))
                {
                    $arrayCheck[$jValue -> classID] = [];
                }
            }
        }
        return $arrayCheck;
    }

    public static function createArraySection($arrayResult, $arrayCheck, $indexArrayResult): array
    {
        $arraySection = [];
        for ($i = 0; $i < $indexArrayResult; $i++)
        {
            $countSection = count($arrayResult[$i][0]);
            $countClassID = count($arrayResult[$i][1]);
            $num = (int)ceil($countClassID/ $countSection);
            foreach ($arrayResult[$i][0] as $jValue) {
                $flagNum = 0;
                $checkString = $jValue -> beginDate . "-" . $jValue -> shift;
                $keyDelete = [];
                foreach ($arrayResult[$i][1] as $k => $kValue) {
                    //check
                    if (!isset($arrayResult[$i][1][$k]))
                    {
                        continue;
                    }
                    if ($flagNum === $num ) {
                        break;
                    }
                    if (!in_array($checkString, $arrayCheck[$kValue -> classID], false)) {
                        $arrayCheck[$kValue -> classID][] = $checkString;
                        $arraySection[$jValue -> sectionID][] = $kValue -> classID;
                        $flagNum++;
                        $keyDelete[] = $k;
                    }
                }

                foreach ($keyDelete as $key) {
                    unset($arrayResult[$i][1][$key]);
                }
            }

        }
        return $arraySection;
    }
}
