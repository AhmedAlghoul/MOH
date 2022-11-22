<?php

namespace App\Http\Controllers;

use App\Models\Laboratorycalc;
use Illuminate\Http\Request;

class LaboratorycalcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Laboratorycalc::all();
        return view('cms.viewkeyCalcResult.laboratoryCalcResult', ['lab_technicians' => $data]);
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
        $laboratorycalc = new Laboratorycalc();
        $laboratorycalc->hospital_name = $request->hospital_name;
        $laboratorycalc->department = $request->department;
        $laboratorycalc->laboratory_technicians_count = $request->laboratory_technicians_count;
        $laboratorycalc->number_of_examinations = $request->number_of_examinations;
        $laboratorycalc->result = $request->result;
        $laboratorycalc->need = $request->need;
        $laboratorycalc->save();
        return redirect()->route('keycalc.create')->with('success', 'تم حفظ البيانات بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Laboratorycalc  $laboratorycalc
     * @return \Illuminate\Http\Response
     */
    public function show(Laboratorycalc $laboratorycalc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Laboratorycalc  $laboratorycalc
     * @return \Illuminate\Http\Response
     */
    public function edit(Laboratorycalc $laboratorycalc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Laboratorycalc  $laboratorycalc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Laboratorycalc $laboratorycalc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Laboratorycalc  $laboratorycalc
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laboratorycalc $laboratorycalc)
    {
        //
    }
}
