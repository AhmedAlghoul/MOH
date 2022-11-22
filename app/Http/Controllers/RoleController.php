<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Expr\Cast\String_;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roles = Role::withCount('permissions')->paginate(10);
        return view('cms.spatie.roles.index', ['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return response()->view('cms.spatie.roles.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'name' => 'required|string|max:100',
            'guard' => 'required|in:web,admin|string',
        ], [
            'name.required' => 'الرجاء إدخال اسم الدور الوظيفي',
            'guard.required' => 'الرجاء إدخال نوع الدور الوظيفي',
            'guard.in' => 'الرجاء إدخال نوع الدور الوظيفي بشكل صحيح',
        ]);

        if (!$validator->fails()) {
            $role = new Role();
            $role->name = $request->get('name');
            $role->guard_name = $request->get('guard');
            $isSaved = $role->save();
            return response()->json(['message' => $isSaved ? "تم إنشاء الدور الوظيفي بنجاح" : "لم يتم إنشاء الدور الوظيفي بنجاح"], $isSaved ? 200 : 400);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], 400);
        }

        //validate data
        // $request->validate(
        //     [
        //         'name' => 'required',
        //         'department_description' => 'required',
        //     ],
        //     [
        //         'name.required' => 'الرجاء إدخال اسم القسم',
        //         'department_description.required' => 'الرجاء إدخال الوصف الوظيفي للقسم',
        //     ]
        // );
        // $department = new Department();
        // $department->name = $request->name;
        // $department->department_description = $request->department_description;
        // $department->is_active = $request->has('is_active') ? true : false;
        // $department->save();
        // session()->flash('success', 'تم إضافة القسم بنجاح');
        // return redirect()->route('department.create');
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
        $role = Role::find($id);
        return response()->view('cms.spatie.roles.edit', ['role' => $role]);
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
        $validator = Validator($request->all(), [
            'name' => 'required|string|max:100',
            'guard' => 'required|in:web,admin|string',
        ], [
            'name.required' => 'الرجاء إدخال اسم الدور الوظيفي',
            'guard.required' => 'الرجاء إدخال نوع الدور الوظيفي',
            'guard.in' => 'الرجاء إدخال نوع الدور الوظيفي بشكل صحيح',
        ]);

        if (!$validator->fails()) {
            $role = Role::find($id);
            $role->name = $request->get('name');
            $role->guard_name = $request->get('guard');
            $isSaved = $role->save();
            return response()->json(['message' => $isSaved ? "تم تحديث الدور الوظيفي بنجاح" : "لم يتم تحديث الدور الوظيفي بنجاح"], $isSaved ? 200 : 400);
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
    public function destroy(Role $role)
    {
        $isDeleted = $role->delete();
        return response()->json(['message' => $isDeleted ? 'تم حذف الدور الوظيفي بنجاح' : 'حدث خطأ أثناء حذف الدور الوظيفي'], $isDeleted ? 200 : 400);
    }
}
