<?php

namespace App\Imports;

use Log;
use App\Models\OpenfundStudent;
use Maatwebsite\Excel\Concerns\ToModel;

class OpenfundStudentImport implements ToModel
{
    public function model(array $row)
    {
        // Check if 'qalam_id' is present and not empty
        if (empty($row[0])) {
            // Log an error or handle it as needed
            Log::error('Missing qalam_id for row', ['row' => $row]);
            return null; // Skip this row or handle it differently
        }

        return new OpenfundStudent([
            'qalam_id' => $row[0],
            'student_name' => $row[1] ?? null,
            'father_name' => $row[2] ?? null,
            'institutions' => $row[3] ?? null,
            'discipline' => $row[4] ?? null,
            'contact_no' => $row[5] ?? null,
            'home_address' => $row[6] ?? null,
            'scholarship_name' => $row[7] ?? null,
            'nust_trust_fund_donor_name' => $row[8] ?? null,
            'province' => $row[9] ?? null,
            'domicile' => $row[10] ?? null,
            'gender' => $row[11] ?? null,
            'program' => $row[12] ?? null,
            'degree' => $row[13] ?? null,
            'year_of_admission' => $row[14] ?? null,
            'father_status' => substr($row[15] ?? null, 0, 255),
            'father_profession' => $row[16] ?? null,
            'monthly_income' => $row[17] ?? null,
            'statement_of_purpose' => $row[18] ?? null,
            'remarks' => $row[19] ?? null,
            'images' => $row[20] ?? null,
        ]);
    }

}
