<?php

namespace App\Exports;

use App\Models\Employee;
use App\Models\Role;
// use Illuminate\Support\Facades\Date;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class EmployeesExport implements FromCollection, WithHeadings, WithEvents, ShouldAutoSize, WithStyles, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function (AfterSheet $event) {
                $event->sheet->getDelegate()->setRightToLeft(true);
            },
        ];
    }
    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],
        ];
    }

    public function headings(): array
    {
        return [
            'رقم الموظف',
            'الرقم الوظيفي',
            'اسم الموظف',
            'تاريخ التعيين',
            'اسم المستشفى',
            'اسم القسم',
            'الدور الوظيفي',
            'رقم الجوال',
        ];
    }
    public function collection()
    {
        return Employee::all();
    }
    /**
     * @var Employee $employee
     */
    public function map($employee): array
    {
        return [
            $employee->id,
            $employee->job_number,
            $employee->employee_name,
            $employee->date_of_hiring,
            $employee->hospitals->name,
            $employee->departments->name,
            $employee->Roles->Role_name,
            $employee->mobile_number,
        ];
    }
}
