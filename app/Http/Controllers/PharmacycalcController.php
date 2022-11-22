<?php

namespace App\Http\Controllers;

use App\Models\Pharmacycalc;
use Illuminate\Http\Request;

class PharmacycalcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Pharmacycalc::all();
        return view('cms.viewkeyCalcResult.pharmacycalcResult', ['pharmacies' => $data]);
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
        //
        $pharmacycalc = new Pharmacycalc();
        $pharmacycalc->hospital_name = $request->hospital_name;
        $pharmacycalc->department = $request->department;
        $pharmacycalc->number_of_prescriptions = $request->number_of_prescriptions;
        $pharmacycalc->number_of_medical_reports = $request->number_of_medical_reports;
        $pharmacycalc->pharmacist_count = $request->pharmacist_count;
        $pharmacycalc->pharmacist_count = $request->pharmacist_count;
        $pharmacycalc->result = $request->result;
        $pharmacycalc->need = $request->need;
        $pharmacycalc->save();
        return redirect()->route('keycalc.create')->with('success', 'تم حفظ البيانات بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pharmacycalc  $pharmacycalc
     * @return \Illuminate\Http\Response
     */
    public function show(Pharmacycalc $pharmacycalc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pharmacycalc  $pharmacycalc
     * @return \Illuminate\Http\Response
     */
    public function edit(Pharmacycalc $pharmacycalc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pharmacycalc  $pharmacycalc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pharmacycalc $pharmacycalc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pharmacycalc  $pharmacycalc
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pharmacycalc $pharmacycalc)
    {
        //
    }
}
