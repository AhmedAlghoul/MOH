<?php

namespace App\Imports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToModel;

class EmployeesImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Employee([
            //
            'job_number' => $row[0],
            'employee_name' => $row[1],
            'date_of_hiring' => $row[2],
            'hospital_id' => $row[3],
            'department_id' => $row[4],
            'role_id' => $row[5],
            'mobile_number' => $row[6],
        ]);
    }
}
