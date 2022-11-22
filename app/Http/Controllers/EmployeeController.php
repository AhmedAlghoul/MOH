<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Hospital;
use App\Models\EmployeeRole;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\EmployeesImport;
use App\Exports\EmployeesExport;
use App\Models\circle;
use App\Models\HospitalDepartment;
use Psy\Readline\Hoa\Console;
use SebastianBergmann\Environment\Console as EnvironmentConsole;

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
        $data = Employee::paginate(25);
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
        $roles = EmployeeRole::where('is_active', 1)->get();
        $circles = circle::where('is_active', 1)->get();
        return view('cms.employees.form', compact('departments', 'hospitals', 'roles', 'circles'));
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
                // 'date_of_hiring' => 'required',
                'department' => 'required',
                'circle' => 'required',
                'hospital' => 'required',
                'role' => 'required',
                'mobile_number' => 'required',
            ],
            [
                'job_number.required' => 'الرجاء إدخال رقم الوظيفة',

                'employee_name.required' => 'الرجاء إدخال اسم الموظف',
                // 'date_of_hiring.required' => 'الرجاء إدخال تاريخ التعيين',
                'department.required' => 'الرجاء اختيار القسم',
                'circle.required' => 'الرجاء اختيار الدائرة',
                'hospital.required' => 'الرجاء ختيار المستشفى',
                'role.required' => 'الرجاء اختيار الدور',
                'mobile_number.required' => 'الرجاء إدخال رقم الجوال',
            ]
        );


        $employee = new Employee();
        $employee->job_number = $request->job_number;
        $employee->employee_name = $request->employee_name;
        // $employee->date_of_hiring = $request->date_of_hiring;
        //get the id of the last inserted row
        $employee->hospital_id = $request->hospital;
        $employee->circle_id = $request->circle;
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
        $employee = Employee::findOrFail($id);
        $departments = Department::where('is_active', 1)->get();
        // $hospitals = HospitalDepartment::where('department_id', $employee->department_id)->first();
        $hospitals = Hospital::all();
        $roles = EmployeeRole::where('is_active', 1)->get();
        $circles = circle::where('is_active', 1)->get();
        return view('cms.employees.edit', compact('employee', 'departments', 'hospitals', 'roles', 'circles'));
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
        $request->validate(
            [
                'job_number' => 'required',
                'employee_name' => 'required',
                // 'date_of_hiring' => 'required',
                'department' => 'required',
                'circle' => 'required',
                'hospital' => 'required',
                'role' => 'required',
                'mobile_number' => 'required',
            ],
            [
                'job_number.required' => 'الرجاء إدخال رقم الوظيفة',

                'employee_name.required' => 'الرجاء إدخال اسم الموظف',
                // 'date_of_hiring.required' => 'الرجاء إدخال تاريخ التعيين',
                'department.required' => 'الرجاء اختيار القسم',
                'circle.required' => 'الرجاء اختيار الدائرة',
                'hospital.required' => 'الرجاء ختيار المستشفى',
                'role.required' => 'الرجاء اختيار الدور',
                'mobile_number.required' => 'الرجاء إدخال رقم الجوال',
            ]
        );
        $employee = Employee::findOrFail($id);
        $employee->job_number = $request->job_number;
        $employee->employee_name = $request->employee_name;
        // $employee->date_of_hiring = $request->date_of_hiring;
        //get the id of the last inserted row
        $employee->hospital_id = $request->hospital;
        $employee->circle_id = $request->circle;
        $employee->department_id = $request->department;
        $employee->role_id = $request->role;
        $employee->mobile_number = $request->mobile_number;
        $employee->save();
        session()->flash('success', 'تم تعديل بيانات الموظف بنجاح');
        return redirect()->back();
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
        $isDestroyed = Employee::destroy($id);
        return response()->json(['message' => $isDestroyed ? 'تم حذف الموظف بنجاح' : 'حدث خطأ أثناء حذف الموظف '], $isDestroyed ? 200 : 400);
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


    //
    public function getEmployeeDepartments()
    {
        //to get department id 
        $alldepartments = HospitalDepartment::where("hospital_id", $_REQUEST['hospital_id'])->pluck('department_id');
        // return response()->json($alldepartments);
        //to get department name and all department data
        $department = Department::whereIn("id", $alldepartments)->get();
        return response()->json($department);
    }
}
