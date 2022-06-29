<?php

namespace App\Imports;

use App\Models\Academic;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithStartRow;

class AcademicsImport implements ToModel, WithCustomCsvSettings, WithStartRow
{
    public function startRow(): int
    {
        return 2;
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ';'
        ];
    }

    public function model(array $row): Academic
    {
        return new Academic([
            'academicID' => $row[1],
            'password' => $row[2],
            'fullName' => $row[3],
            'gender' => $row[4],
            'address' => $row[5],
            'phoneNumber' => $row[6],
        ]);
    }
}
