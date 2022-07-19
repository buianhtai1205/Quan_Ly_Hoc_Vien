<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentsImport implements ToArray, WithHeadingRow
{

    public function array(array $array) : void
    {
        try
        {
            foreach ($array as $each)
            {
                $studentID =  $each['studentid'];
                $password = $each['password'];
                $fullName = $each['fullname'];
                $birthDate = strtotime($each['birthdate']);
                $newFormat = date('Y-m-d', $birthDate);
                $gender = $each['gender'];
                $address = $each['address'];
                $phoneNumber = $each['phonenumber'];

                Student::create([
                    'studentID' => $studentID,
                    'password' => $password,
                    'fullName' => $fullName,
                    'birthDate' => $newFormat,
                    'gender' => $gender,
                    'address' => $address,
                    'phoneNumber' => $phoneNumber,
                    'avatar' => '0',
                ]);
            }
        }
        catch(Exception $e)
        {
            dd($each);
        }
    }
}
