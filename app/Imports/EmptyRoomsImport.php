<?php

namespace App\Imports;

use App\Models\EmptyRoom;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EmptyRoomsImport implements ToArray, WithHeadingRow
{
    public function array(array $array) : void
    {
        try
        {
            $date = $array[0]['begindate'];

            foreach ($array as $each)
            {
                $roomName =  $each['roomname'];
                $status = '0';
                for ($j = 0; $j < 6; $j++)
                {
                    $beginDate = date('Y-m-d', strtotime($date . ' + ' . $j . ' days'));
                    for($i = 1; $i <= 4; $i++)
                    {
                        $shift = $i;
                        EmptyRoom::create([
                            'roomName' => $roomName,
                            'beginDate' => $beginDate,
                            'shift' => $shift,
                            'status' => $status,
                        ]);
                    }
                }
            }
        }
        catch(Exception $e)
        {
            dd($each);
        }
    }
}
