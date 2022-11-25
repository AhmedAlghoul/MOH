<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\DoctorCalc;
use App\Models\Employee;
use App\Models\EmployeeRole;
use App\Models\Key;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;

class DoctorCalcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = DoctorCalc::all();
        return view('cms.viewkeyCalcResult.doctorCalcResult', ['doctors' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return response()->view('cms.doctorcalc.doctorcalc');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $doctor_result = $request->get('monthly_hours') / 140;
        // $doctor_need = $request->get('doctor_count') - $doctor_result;
        // $doctorcalc = new DoctorCalc();
        // $doctorcalc->hospital_id = $request->hospital_id;
        // $doctorcalc->department_id = $request->department_id;
        // $doctorcalc->monthly_hours = $request->monthly_hours;
        // $doctorcalc->doctor_count = $request->doctor_count;
        // $doctorcalc->doctor_result = $doctor_result;
        // $doctorcalc->doctor_need = $doctor_need;
        // $doctorcalc->save();


        $doctor_result = $request->get('monthly_hours') / 140;
        $doctor_need = $request->get('doctor_count') - $doctor_result;
        $doctorcalc = new DoctorCalc();
        $doctorcalc->hospital_name = $request->hospital_name;
        $doctorcalc->department = $request->department;
        $doctorcalc->monthly_hours = $request->monthly_hours;
        $doctorcalc->doctor_count = $request->doctor_count;
        $doctorcalc->doctor_result = $doctor_result;
        $doctorcalc->doctor_need = $doctor_need;
        $doctorcalc->save();



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
        $isDestroyed = DoctorCalc::destroy($id);
        return response()->json(['message' => $isDestroyed ? 'تم حذف نتيجة القسم بنجاح' : 'حدث خطأ أثناء حذف نتيجة القسم '], $isDestroyed ? 200 : 400);
    }
}
