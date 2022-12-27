<?php

namespace App\Http\Controllers;

use App\Exports\CirclesExport;
use App\Models\circle;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CircleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = circle::paginate(15);

        return response()->view('cms.circles.index', ['circles' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return response()->view('cms.circles.form');
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
        //validate data
        $request->validate(
            [
                'circle_name' => 'required',
                'is_active' => 'in:on',
            ],
            [
                'circle_name.required' => 'الرجاء إدخال اسم الدائرة',
            ]
        );
        $circle = new circle();
        $circle->circle_name = $request->circle_name;
        $circle->is_active = $request->has('is_active') ? true : false;
        $circle->save();
        session()->flash('success', 'تم إضافة الدائرة بنجاح');
        return redirect()->route('circle.create');
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
        $circle = circle::findOrFail($id);
        return response()->view('cms.circles.edit', ['circle' => $circle]);
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
        $request->validate(
            [
                'circle_name' => 'required',
                'is_active' => 'in:on',
            ],
            [
                'circle_name.required' => 'الرجاء إدخال اسم الدائرة',
            ]
        );
        $circle = circle::findOrFail($id);
        $circle->circle_name = $request->circle_name;
        $circle->is_active = $request->has('is_active') ? true : false;
        $circle->save();
        session()->flash('success', 'تم تعديل الدائرة بنجاح');
        return redirect()->back();
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
        $isDestroyed = circle::destroy($id);
        return response()->json();
    }
    public function export()
    {
        return Excel::download(new CirclesExport, 'circles.xlsx');
    }
}
