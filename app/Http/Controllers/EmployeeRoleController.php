<?php

namespace App\Http\Controllers;

use App\Models\EmployeeRole;

use Illuminate\Http\Request;

class EmployeeRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = EmployeeRole::paginate(6);

        return response()->view('cms.Roles.index', ['roles' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return response()->view('cms.Roles.form');
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
                'Role_name' => 'required',
                'is_active' => 'in:on',
            ],
            [
                'Role_name.required' => 'الرجاء إدخال اسم الدور وظيفي',
            ]
        );
        $Role = new EmployeeRole();
        $Role->Role_name = $request->Role_name;
        $Role->is_active = $request->has('is_active') ? true : false;
        $Role->save();
        session()->flash('success', 'تم إضافة الدور وظيفي بنجاح');
        return redirect()->back();
    }

    /**Role
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
        $role = EmployeeRole::find($id);
        return response()->view('cms.roles.edit', ['role' => $role]);
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
                'Role_name' => 'required',
                'is_active' => 'in:on',
            ],
            [
                'Role_name.required' => 'الرجاء إدخال اسم الدور وظيفي',
            ]

        );
        $Role = EmployeeRole::find($id);
        $Role->Role_name = $request->Role_name;
        $Role->is_active = $request->has('is_active') ? true : false;
        $Role->save();
        session()->flash('success', 'تم تعديل الدور وظيفي بنجاح');
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
        $isDestroyed = EmployeeRole::destroy($id);
        return response()->json();
    }
}
