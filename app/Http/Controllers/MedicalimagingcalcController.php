<?php

namespace App\Http\Controllers;

use App\Models\Medicalimagingcalc;
use Illuminate\Http\Request;

class MedicalimagingcalcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Medicalimagingcalc::all();
        return view('cms.viewkeyCalcResult.medicalimagingCalcResult', ['medicalimaging' => $data]);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Medicalimagingcalc  $medicalimagingcalc
     * @return \Illuminate\Http\Response
     */
    public function show(Medicalimagingcalc $medicalimagingcalc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Medicalimagingcalc  $medicalimagingcalc
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicalimagingcalc $medicalimagingcalc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Medicalimagingcalc  $medicalimagingcalc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medicalimagingcalc $medicalimagingcalc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medicalimagingcalc  $medicalimagingcalc
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicalimagingcalc $medicalimagingcalc)
    {
        //
    }
}
