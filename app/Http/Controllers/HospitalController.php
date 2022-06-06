<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Hospital;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $hospitals = Hospital::get();
        return view('cms.Hospitals.index', compact('hospitals'));
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
        return response()->view('cms.Hospitals.form', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        //validate data

        // $request->validate(
        //     [
        //         'hospital_name' => 'required',
        //         'department[]' => 'required',
        //     ],
        //     [
        //         'hospital_name.required' => 'الرجاء إدخال اسم المستشفى',
        //         'department.required' => 'الرجاء إختيار الأقسام',
        //     ]
        // );
        $hospital = new Hospital();
        $hospital->name = $request->hospital_name;
        $hospital->save();
        $hospital->departments()->attach($request->department);
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
        $hospital = Hospital::findOrFail($id);
        //get all selected departments and return it to array
        $department = $hospital->departments()->get();
        // $department = $hospital->departments()->get();
        return response()->view('cms.hospitals.edit', ['hospital' => $hospital, 'department' => $department]);
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
        $isDestroyed = Hospital::destroy($id);
        return response()->json();
    }
}
