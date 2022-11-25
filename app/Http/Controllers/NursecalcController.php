<?php

namespace App\Http\Controllers;

use App\Models\nursecalc;
use Illuminate\Http\Request;

class NursecalcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = nursecalc::all();
        return view('cms.viewkeyCalcResult.nursecalcResult', ['nurses' => $data]);
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

        $nursecalc = new nursecalc();
        $nursecalc->hospital_name = $request->hospital_name;
        $nursecalc->department = $request->department;
        $nursecalc->key_value = $request->key_value;
        $nursecalc->bed_count = $request->bed_count;
        $nursecalc->nurse_count = $request->nurse_count;
        $nursecalc->need = $request->need;
        $nursecalc->result = $request->result;
        $nursecalc->save();

        return redirect()->route('keycalc.create') ->with('success', 'تم حفظ البيانات بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\nursecalc  $nursecalc
     * @return \Illuminate\Http\Response
     */
    public function show(nursecalc $nursecalc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\nursecalc  $nursecalc
     * @return \Illuminate\Http\Response
     */
    public function edit(nursecalc $nursecalc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\nursecalc  $nursecalc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, nursecalc $nursecalc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\nursecalc  $nursecalc
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $isDestroyed = nursecalc::destroy($id);
        return response()->json(['message' => $isDestroyed ? 'تم حذف نتيجة القسم بنجاح' : 'حدث خطأ أثناء حذف نتيجة القسم '], $isDestroyed ? 200 : 400);
    }
}
