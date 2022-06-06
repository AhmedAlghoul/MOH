<?php

namespace App\Http\Controllers;

use App\Models\Key;
use App\Models\Department;
use App\Models\Role;
use Illuminate\Http\Request;

class KeyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Key::all();
        return response()->view('cms.Keys.index', ['keys' => $data]);
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
        $roles = Role::where('is_active', 1)->get();
        return response()->view('cms.Keys.form', compact('departments', 'roles'));
        // return response()->view('cms.keys.form', compact('departments','roles'));
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
                'department' => 'required',
                'role' => 'required',
                'key_value' => 'required',
            ],
            [
                'department.required' => 'الرجاء اختيار القسم',
                'role.required' => 'الرجاء اختيار الدور',
                'key_value.required' => 'الرجاء إدخال مفتاح الكادر',
            ]
        );
        $key = new Key();
        $key->department_id = $request->department;
        $key->role_id = $request->role;
        $key->key_value = $request->key_value;
        $key->save();
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
    }
}
