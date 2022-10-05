<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $permissions = Permission::paginate(10);
        return view('cms.spatie.permissions.index', ['permissions' => $permissions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return response()->view('cms.spatie.permissions.form');
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
        $validator = Validator(
            $request->all(),
            [
                'name' => 'required|string|max:100',
                'guard' => 'required|in:web,admin',

            ],
            [
                'name.required' => 'الرجاء إدخال اسم الصلاحية',
                'guard.required' => 'الرجاء إدخال نوع الصلاحية',
                'guard.in' => 'الرجاء إدخال نوع الصلاحية بشكل صحيح',
            ]
        );
        if (!$validator->fails()) {
            $permission = new Permission();
            $permission->name = $request->get('name');
            $permission->guard_name = $request->get('guard');
            $isSaved = $permission->save();
            return response()->json(['message' => $isSaved ? "تم إنشاء الصلاحية بنجاح" : "لم يتم إنشاء الصلاحية بنجاح"], $isSaved ? 200 : 400);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], 400);
        }
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
        $permission = Permission::findById($id);
        return response()->view('cms.spatie.permissions.edit', ['permission' => $permission]);
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
        $validator = Validator(
            $request->all(),
            [
                'name' => 'required|string|max:100',
                'guard' => 'required|in:web,admin',

            ],
            [
                'name.required' => 'الرجاء إدخال اسم الصلاحية',
                'guard.required' => 'الرجاء إدخال نوع الصلاحية',
                'guard.in' => 'الرجاء إدخال نوع الصلاحية بشكل صحيح',
            ]
        );
        if (!$validator->fails()) {
            $permission = Permission::findById($id);
            $permission->name = $request->get('name');
            $permission->guard_name = $request->get('guard');
            $isSaved = $permission->save();
            return response()->json(['message' => $isSaved ? "تم إنشاء الصلاحية بنجاح" : "لم يتم إنشاء الصلاحية بنجاح"], $isSaved ? 200 : 400);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], 400);
        }
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
        $isDeleted = Permission::destroy($id);
        return response()->json(['message' => $isDeleted ? "تم حذف الصلاحية بنجاح" : "فشل حذف الصلاحية "], $isDeleted ? 200 : 400);
    }
}
