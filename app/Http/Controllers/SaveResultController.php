<?php

namespace App\Http\Controllers;

use App\Models\SaveResult;
use Illuminate\Http\Request;

class SaveResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = SaveResult::all();
        return view('cms.Results', ['calcResults' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate(
        //     [
        //         'job_number' => 'required|unique:employees',
        //         'employee_name' => 'required',
        //         // 'date_of_hiring' => 'required',
        //         'department' => 'required',
        //         'circle' => 'required',
        //         'hospital' => 'required',
        //         'role' => 'required',
        //         'mobile_number' => 'required',
        //     ],
        //     [
        //         'job_number.required' => 'الرجاء إدخال رقم الوظيفة',

        //         'employee_name.required' => 'الرجاء إدخال اسم الموظف',
        //         // 'date_of_hiring.required' => 'الرجاء إدخال تاريخ التعيين',
        //         'department.required' => 'الرجاء اختيار القسم',
        //         'circle.required' => 'الرجاء اختيار الدائرة',
        //         'hospital.required' => 'الرجاء ختيار المستشفى',
        //         'role.required' => 'الرجاء اختيار الدور',
        //         'mobile_number.required' => 'الرجاء إدخال رقم الجوال',
        //     ]
        // );


        $saveresult= new SaveResult();
        $saveresult->JOBTITLE_ID= $request->jobtitle_id;
        $saveresult->DEPARTMENT_ID = $request->department_id;
        $saveresult->KEY_VALUE = $request->key_value;
        $saveresult->CALC_TYPE_ID = $request->calc_type_id;
        $saveresult->EMP_COUNT = $request->emp_count;
        $saveresult->RESULT_CALC = $request->result;
        $saveresult->NEED_EMP = $request->need;
        // $saveresult->DTL_REUSLT = $request->mobile_number;
        $saveresult->save();
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
}
