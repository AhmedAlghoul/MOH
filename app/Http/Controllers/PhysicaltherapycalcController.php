<?php

namespace App\Http\Controllers;

use App\Models\Physicaltherapycalc;
use Illuminate\Http\Request;

class PhysicaltherapycalcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Physicaltherapycalc::all();
        return view('cms.viewkeyCalcResult.physicaltherapyCalcResult', ['physical_therapists' => $data]);    }

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
        $therapistcalc = new Physicaltherapycalc();
        $therapistcalc->hospital_name = $request->hospital_name;
        $therapistcalc->department = $request->department;
        $therapistcalc->physical_therapist_count = $request->physical_therapist_count;
        $therapistcalc->number_of_sessions = $request->number_of_sessions;
        $therapistcalc->result = $request->result;
        $therapistcalc->need = $request->need;
        $therapistcalc->save();

        return redirect()->route('keycalc.create')->with('success', 'تم حفظ البيانات بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Physicaltherapycalc  $physicaltherapycalc
     * @return \Illuminate\Http\Response
     */
    public function show(Physicaltherapycalc $physicaltherapycalc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Physicaltherapycalc  $physicaltherapycalc
     * @return \Illuminate\Http\Response
     */
    public function edit(Physicaltherapycalc $physicaltherapycalc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Physicaltherapycalc  $physicaltherapycalc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Physicaltherapycalc $physicaltherapycalc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Physicaltherapycalc  $physicaltherapycalc
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $isDestroyed = Physicaltherapycalc::destroy($id);
        return response()->json(['message' => $isDestroyed ? 'تم حذف نتيجة القسم بنجاح' : 'حدث خطأ أثناء حذف نتيجة القسم '], $isDestroyed ? 200 : 400);
    }
}
