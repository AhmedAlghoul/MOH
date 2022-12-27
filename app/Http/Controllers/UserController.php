<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //get role id
        $roles = Role::all();

    // dd($roles);
        $users = User::withCount('permissions')->paginate(15);
        return response()->view('cms.users.index', ['users' => $users, 'roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::all();
        return response()->view('cms.users.form', compact(['roles']));
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
        // $request->validate(
        //     [
        //         'name' => 'required',
        //         'department_description' => 'required',
        //         'is_active' => 'in:on',
        //     ],
        //     [
        //         'name.required' => 'الرجاء إدخال اسم القسم',
        //         'department_description.required' => 'الرجاء إدخال الوصف الوظيفي للقسم',
        //     ]
        // );
        $role = Role::find($request->role_id);
        $user = new User();
        $user->name = $request->name;
        $user->id_number = $request->idnumber;
        $user->mobile_number = $request->mobile;
        $user->role_id = $request->role_id;
        $user->password = Hash::make($request->password);
        $user->is_active = $request->has('is_active') ? true : false;

        $isSaved = $user->save();
        if ($isSaved) {
            $user->assignRole($role);
            return redirect()->route('users.index')->with('success', 'تمت إضافة المستخدم بنجاح');
        } else {
            return redirect()->route('users.index')->with('error', 'حدث خطأ أثناء إضافة المستخدم');
        }
        session()->flash('success', 'تم إضافة المستخدم بنجاح');
        return redirect()->route('users.create');
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
        $isDestroyed = User::destroy($id);
        return response()->json();
    }
}
