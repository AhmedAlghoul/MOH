<?php

namespace App\Http\Controllers;

use App\Models\Constant;
use App\Models\Key;
use App\Models\Department;
use App\Models\EmployeeRole;
use App\Models\Managment;
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
        dd($data);
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
        $constants = Constant::all();
        $departments = Department::all();
        $roles = EmployeeRole::all();
        return response()->view('cms.Keys.form', compact('departments', 'roles', 'constants'));
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
                'role' => 'required',
                'key_value' => 'required',
            ],
            [
                'role.required' => 'الرجاء اختيار الدور',
                'key_value.required' => 'الرجاء إدخال مفتاح الكادر',
            ]
        );
        $key = new Key();
        $key->department_id = $request->department;
        $key->role_id = $request->role;
        $key->calc_type_id=$request->calc_type ;
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
        $key = Key::findOrFail($id);
        $departments = Department::where('is_active', 1)->get();
        $roles = EmployeeRole::where('is_active', 1)->get();
        $key_value = $key->key_value;
        return response()->view('cms.Keys.edit', ['key' => $key, 'departments' => $departments, 'roles' => $roles, 'key_value' => $key_value]);
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
        $key = Key::findOrFail($id);
        $key->department_id = $request->department;
        $key->role_id = $request->role;
        $key->key_value = $request->key_value;
        $key->save();
        //redirect to the index page
        return redirect()->route('key.index');
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
        $isDestroyed = Key::destroy($id);
        return response()->json();
    }
    public function treeview($select = null)
    {
        $trees = Managment::whereNull('TB_MANAGMENT_PARENT')->select(['tb_managment_code', 'tb_managment_name'])->get();

        $arr = [];
        $listt = [];
        $listt['id']     = -1;
        $listt['parent'] = '#';
        $listt['text'] = 'وزارة الصحة';
        array_push($arr, $listt);
        foreach ($trees as $tree) {

            $list_arr         = [];
            $list_arr['id']     = $tree->tb_managment_code;
            $list_arr['parent'] = $tree->tb_managment_parent !== null ? $tree->tb_managment_parent : '-1';
            $list_arr['text'] = $tree->tb_managment_name;

            array_push($arr, $list_arr);
        }

        $children = Managment::whereNotNull('TB_MANAGMENT_PARENT')->select(['tb_managment_code', 'tb_managment_parent', 'tb_managment_name'])->get();
        foreach ($children as $child) {

            $list_array         = [];
            $list_array['id']     = $child->tb_managment_code;
            $list_array['parent'] = $child->tb_managment_parent;
            $list_array['text'] = $child->tb_managment_name;
            array_push($arr, $list_array);
        }


        header('Content-type: text/json');
        header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
        echo json_encode($arr);
    }
}
