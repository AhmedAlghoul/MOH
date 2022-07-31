<?php

namespace App\Imports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

class EmployeesImport implements ToModel,  SkipsEmptyRows, WithStartRow
// WithHeadingRow,
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {


        // return new Employee([
        //     'job_number' => $row['الرقم الوظيفي'],
        //     'employee_name' => $row['اسم الموظف'],
        //     'date_of_hiring' => $row['تاريخ التعيين'],
        //     'hospital_id' => $row['اسم المستشفى'],
        //     'department_id' => $row['اسم القسم'],
        //     'role_id' => $row['الدور الوظيفي'],
        //     'mobile_number' => $row['رقم الجوال'],
        // ]);
        // HeadingRowFormatter::default('none');

        return new Employee([

            'job_number' => $row[0],
            'employee_name' => $row[1],
            // 'date_of_hiring' => $row[4],
            'hospital_id' => $row[2],
            'department_id' => $row[3],
            'role_id' => $row[4],
            'mobile_number' => $row[5],
        ]);
    }
    //to skip heading row
    public function startRow(): int
    {
        return 2;
    }
}
