<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Hospital;
use App\Models\Role;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\EmployeesImport;
use App\Exports\EmployeesExport;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Employee::all();
        return view('cms.employees.index', ['employees' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $departments = Department::where('is_active', 1)->get();
        $hospitals = Hospital::all();
        $roles = Role::where('is_active', 1)->get();
        return view('cms.employees.form', compact('departments', 'hospitals', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            [
                'job_number' => 'required|unique:employees',
                'employee_name' => 'required',
                'date_of_hiring' => 'required',
                'department' => 'required',
                'hospital' => 'required',
                'role' => 'required',
                'mobile_number' => 'required',
            ],
            [
                'job_number.required' => 'الرجاء إدخال رقم الوظيفة',

                'employee_name.required' => 'الرجاء إدخال اسم الموظف',
                'date_of_hiring.required' => 'الرجاء إدخال تاريخ التعيين',
                'department.required' => 'الرجاء اختيار القسم',
                'hospital.required' => 'الرجاء ختيار المستشفى',
                'role.required' => 'الرجاء اختيار الدور',
                'mobile_number.required' => 'الرجاء إدخال رقم الجوال',
            ]
        );


        $employee = new Employee();
        $employee->job_number = $request->job_number;
        $employee->employee_name = $request->employee_name;
        $employee->date_of_hiring = $request->date_of_hiring;
        //get the id of the last inserted row
        $employee->hospital_id = $request->hospital;
        $employee->department_id = $request->department;
        $employee->role_id = $request->role;
        $employee->mobile_number = $request->mobile_number;
        $employee->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function fileImportExport()
    {
        return view('file-import');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function fileImport(Request $request)
    {
        Excel::import(new EmployeesImport, $request->file('file')->store('temp'));
        return back();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function fileExport()
    {
        return Excel::download(new EmployeesExport, 'employees-collection.xlsx');
    }
}
