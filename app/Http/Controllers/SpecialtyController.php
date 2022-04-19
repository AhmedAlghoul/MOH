<?php

namespace App\Http\Controllers;

use App\Models\Specialty;

use Illuminate\Http\Request;

class SpecialtyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Specialty::paginate(6);

        return response()->view('cms.Specialties.index', ['Specialties' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return response()->view('cms.Specialties.form');
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
        $request->validate(
            [
                'name' => 'required',
                'is_active' => 'in:on',
            ],
            [
                'name.required' => 'الرجاء إدخال اسم التخصص',
            ]
        );
        $Specialty = new Specialty();
        $Specialty->name = $request->name;
        $Specialty->is_active = $request->has('is_active') ? true : false;
        $Specialty->save();
        session()->flash('success', 'تم إضافة التخصص بنجاح');
        return redirect()->route('Specialty.create');
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
        $Specialty = Specialty::find($id);
        return response()->view('cms.Specialties.form', ['Specialty' => $Specialty]);
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
                'name' => 'required',
                'is_active' => 'in:on',
            ],
            [
                'name.required' => 'الرجاء إدخال اسم التخصص',
            ]
        );
        $Specialty = Specialty::find($id);
        $Specialty->name = $request->name;
        $Specialty->is_active = $request->has('is_active') ? true : false;
        $Specialty->save();
        session()->flash('success', 'تم تعديل التخصص بنجاح');
        return redirect()->route('Specialty.create');
        
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
    }
}
