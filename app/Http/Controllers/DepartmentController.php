<?php

namespace App\Http\Controllers;

use App\Exports\DepartmentsExport;
use App\Models\Department;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Department::paginate(15);

        return response()->view('cms.departments.index', ['departments' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return response()->view('cms.departments.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate data
        $request->validate(
            [
                'name' => 'required',
                'department_description' => 'required',
                'is_active' => 'in:on',
            ],
            [
                'name.required' => 'الرجاء إدخال اسم القسم',
                'department_description.required' => 'الرجاء إدخال الوصف الوظيفي للقسم',
            ]
        );
        $department = new Department();
        $department->name = $request->name;
        $department->department_description = $request->department_description;
        $department->is_active = $request->has('is_active') ? true : false;
        $department->save();
        session()->flash('success', 'تم إضافة القسم بنجاح');
        return redirect()->route('department.create');
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
        $department = Department::findOrFail($id);
        return response()->view('cms.departments.edit', ['department' => $department]);
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
                'name' => 'required',
                'department_description' => 'required',
                'is_active' => 'in:on',
            ],
            [
                'name.required' => 'الرجاء إدخال اسم القسم',
                'department_description.required' => 'الرجاء إدخال الوصف الوظيفي للقسم',


            ]
        );
        $department = Department::findOrFail($id);
        $department->name = $request->name;
        $department->department_description = $request->department_description;
        $department->is_active = $request->has('is_active') ? true : false;
        $department->save();
        session()->flash('success', 'تم تعديل القسم بنجاح');
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
        //form submit code
        // $department = Department::findOrFail($id);
        // $department->delete();
        // session()->flash('success', 'تم حذف القسم بنجاح');
        // return redirect()->route('department.index');

        $isDestroyed = Department::destroy($id);
        return response()->json();
    }

    public function export()
    {
        return Excel::download(new DepartmentsExport, 'departments.xlsx');
    }
}
