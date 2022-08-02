<?php

namespace App\Imports;

use App\Models\Student;
use Illuminate\Support\Facades\Hash;
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
                $facultyName = $each['facultyname'];
                $birthDate = strtotime($each['birthdate']);
                $newFormat = date('Y-m-d', $birthDate);
                $gender = $each['gender'];
                $address = $each['address'];
                $phoneNumber = $each['phonenumber'];
                $hashPassword = Hash::make($password);

                Student::create([
                    'studentID' => $studentID,
                    'password' => $hashPassword,
                    'fullName' => $fullName,
                    'facultyName' => $facultyName,
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
