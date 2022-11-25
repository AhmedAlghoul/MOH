<?php

namespace App\Http\Controllers;

use App\Models\Administrativecalc;
use Illuminate\Http\Request;

class AdministrativecalcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Administrativecalc::all();
        return view('cms.viewkeyCalcResult.administrativecalcResult', ['administratives' => $data]);
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
        $nursecalc = new Administrativecalc();
        $nursecalc->hospital_name = $request->hospital_name;
        $nursecalc->department = $request->department;
        $nursecalc->administrative_count = $request->administrative_count;
        $nursecalc->employee_role = $request->employee_role;
        $nursecalc->seven_hours = $request->seven_hours;
        $nursecalc->twenty_four_hours = $request->twenty_four_hours;
        $nursecalc->need = $request->need;
        $nursecalc->result = $request->result;

        $nursecalc->save();

        return redirect()->route('keycalc.create')->with('success', 'تم حفظ البيانات بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Administrativecalc  $administrativecalc
     * @return \Illuminate\Http\Response
     */
    public function show(Administrativecalc $administrativecalc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Administrativecalc  $administrativecalc
     * @return \Illuminate\Http\Response
     */
    public function edit(Administrativecalc $administrativecalc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Administrativecalc  $administrativecalc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Administrativecalc $administrativecalc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Administrativecalc  $administrativecalc
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $isDestroyed = Administrativecalc::destroy($id);
        return response()->json(['message' => $isDestroyed ? 'تم حذف نتيجة القسم بنجاح' : 'حدث خطأ أثناء حذف نتيجة القسم '], $isDestroyed ? 200 : 400);
    }
}
