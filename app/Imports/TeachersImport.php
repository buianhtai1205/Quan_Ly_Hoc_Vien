<?php

namespace App\Imports;

use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;
use League\Flysystem\Exception;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TeachersImport implements ToArray, WithHeadingRow
{
    public function array(array $array)
    {
        try {
            foreach ($array as $each ) {
                $teacherID =  $each['teacherid'];
                $password = $each['password'];
                $fullName = $each['fullname'];
                $birthDate = strtotime($each['birthdate']);
                $newFormat = date('Y-m-d', $birthDate);
                $gender = $each['gender'];
                $address = $each['address'];
                $phoneNumber = $each['phonenumber'];
                $level = $each['level'];
                $faculty = $each['faculty'];
                $hashPassword = Hash::make($password);

                Teacher::create([
                    'teacherID' => $teacherID,
                    'password' => $hashPassword,
                    'fullName' => $fullName,
                    'birthDate' => $newFormat,
                    'gender' => $gender,
                    'address' => $address,
                    'phoneNumber' => $phoneNumber,
                    'level' => $level,
                    'faculty' => $faculty,
                    'avatar' => '0',
                ]);
            }
        }
        catch (Exception $e) {
            dd($each);
        }

    }

}
