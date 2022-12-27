<?php

namespace App\Http\Controllers;

use App\Models\FacilityResult;
use App\Models\Hospital;
use Illuminate\Http\Request;

class FacilityResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $hospitals = Hospital::all();
        return view('cms.viewkeyfacilityresult.form', compact('hospitals'));
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
     * @param  \App\Models\FacilityResult  $facilityResult
     * @return \Illuminate\Http\Response
     */
    public function show(FacilityResult $facilityResult)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FacilityResult  $facilityResult
     * @return \Illuminate\Http\Response
     */
    public function edit(FacilityResult $facilityResult)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FacilityResult  $facilityResult
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FacilityResult $facilityResult)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FacilityResult  $facilityResult
     * @return \Illuminate\Http\Response
     */
    public function destroy(FacilityResult $facilityResult)
    {
        //
    }
}
