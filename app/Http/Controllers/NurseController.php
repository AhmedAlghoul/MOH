<?php

namespace App\Http\Controllers;

use App\Models\nurse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class NurseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //elqouent query to get all nurses
        $data = nurse::all();
        return response()->view('cms.nurses.index', ['nurses' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return response()->view('cms.nurses.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the data   
        $request->validate(
            [
                //بنعمل تحقق من البيانات المدخلة في الفورم لكل (كي) على حدا
                'job_number' => 'required|unique:nurses',
                'name' => 'required',
                'date_of_hiring' => 'required',
                'Hospital_name' => 'required',
                'Section_name' => 'required',
                'mobile_number' => 'required',
            ],
            [
                'job_number.required' => 'الرجاء إدخال الرقم الوظيفي',
                'job_number.unique' => 'الرقم الوظيفي موجود بالفعل',
                'name.required' => 'الرجاء إدخال الاسم',
                'date_of_hiring.required' => 'الرجاء إدخال تاريخ التعيين',
                'Hospital_name.required' => 'الرجاء إدخال اسم المستشفى',
                'Section_name.required' => 'الرجاء إدخال اسم القسم',
                'mobile_number.required' => 'الرجاء إدخال رقم الجوال',
            ]
        );
        $nurse = new nurse();
        //بنحط في جيت البيانات المرسلة من الفورم(الاسم الي جوا الانبوت )
        $nurse->job_number = $request->get('job_number');
        $nurse->name = $request->get('name');
        $nurse->date_of_hiring = $request->get('date_of_hiring');
        $nurse->Hospital_name = $request->get('Hospital_name');
        $nurse->Section_name = $request->get('Section_name');
        $nurse->mobile_number = $request->get('mobile_number');
        $nurse->save();
        session()->flash('success', 'تم إضافة الطبيب بنجاح  ');
        return redirect()->route('nurse.create');
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
