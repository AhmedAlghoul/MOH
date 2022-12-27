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
        $medicalimagingcalc = new Medicalimagingcalc();
        $medicalimagingcalc->hospital_name = $request->hospital_name;
        $medicalimagingcalc->department = $request->department;
        $medicalimagingcalc->ray_technician_count = $request->ray_technician_count;
        $medicalimagingcalc->x_rays = $request->x_rays;
        $medicalimagingcalc->Fluoroscopy = $request->Fluoroscopy;
        $medicalimagingcalc->mri = $request->mri;
        $medicalimagingcalc->ct_scan= $request->ct_scan;
        $medicalimagingcalc->result= $request->result;
        $medicalimagingcalc->need= $request->need;
        $medicalimagingcalc->save();

        return redirect()->route('keycalc.create')->with('success', 'تم حفظ البيانات بنجاح');

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
    public function destroy($id)
    {
        //
        $isDestroyed = Medicalimagingcalc::destroy($id);
        return response()->json(['message' => $isDestroyed ? 'تم حذف نتيجة القسم بنجاح' : 'حدث خطأ أثناء حذف نتيجة القسم '], $isDestroyed ? 200 : 400);
    }
}
