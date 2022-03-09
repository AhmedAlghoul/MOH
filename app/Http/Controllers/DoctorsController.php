<?php

namespace App\Http\Controllers;

use App\Models\doctors;
use Illuminate\Http\Request;

class DoctorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //
        return response()->view('cms.doctors.index');
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
     * @param  \App\Models\doctors  $doctors
     * @return \Illuminate\Http\Response
     */
    public function show(doctors $doctors)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\doctors  $doctors
     * @return \Illuminate\Http\Response
     */
    public function edit(doctors $doctors)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\doctors  $doctors
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, doctors $doctors)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\doctors  $doctors
     * @return \Illuminate\Http\Response
     */
    public function destroy(doctors $doctors)
    {
        //
    }
}
