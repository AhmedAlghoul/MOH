<?php

namespace App\Http\Controllers;

use App\Models\Classification;
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
        // dd($data);
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
        // $request->validate(
        //     [
        //         // 'role' => 'required',
        //         'key_value' => 'required',
        //     ],
        //     [
        //         // 'role.required' => 'الرجاء اختيار الدور',
        //         'key_value.required' => 'الرجاء إدخال مفتاح الكادر',
        //     ]
        // );
        // dd($request->all());

        $key = new Key();
        $key->department_id = $request->department;
        $key->role_id = $request->role;
        $key->class_type = $request->classification;
        $key->calc_type_id = $request->calc_type;

        foreach ($request->key_value as $index => $item) {
            if ($index == 0) {
                $key->key_value = intval($item);
            } else {
                $key->{'value_col' . $index} = intval($item);
            }
        }
        // $key->key_value = $request->key_value;
        // $key->value_col1 = $request->key_value1;
        // $key->value_col2 = $request->key_value2;
        $key->calc_method = $request->calc_method;
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
    public function edit($id, Request $request)
    {

        $key = Key::findOrFail($id);
        $my_select_value = $request->input('my_select');
        $departments = Managment::all();
        $roles = EmployeeRole::all();
        $classifications = Classification::all();
        $constants = Constant::all();
        $key_value = $key->key_value;
        $value_col1 = $key->key_value2;
        $value_col2 = $key->key_value3;
        $calc_method = $key->calc_method;
        return response()->view('cms.Keys.edit', ['key' => $key, 'departments' => $departments, 'roles' => $roles, 'key_value' => $key_value, 'value_col1' => $value_col1, 'value_col2' => $value_col2, 'constants' => $constants, 'calc_method' => $calc_method, 'classifications' => $classifications]);
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
        $key->class_type = $request->classification;
        $key->calc_type_id = $request->calc_type;
        $key->key_value = $request->key_value;
        $key->value_col1 = $request->key_value2;
        $key->value_col2 = $request->key_value3;
        $key->calc_method = $request->calc_method;
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

    public function getData(Request $request)
    {
        $choice_id = $request->input('choice_id');

        //get departments of hospital
        if ($choice_id == 1) {

            $Classifications_data = Classification::all();
            return response()->json(['classifications' => $Classifications_data]);
        } elseif ($choice_id == 2) {
            $Job_titles_data = EmployeeRole::all();
            return response()->json(['jobtitles' => $Job_titles_data]);
        }


        //for loop in departments to get name of department
        // $departments_id = [];
        // $departments_name = [];
        // foreach ($departments as $department) {
        //     $departments_name[] = $department->departments->name;
        // }
        // return response()->json($departments_name);
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

    // public function getLabelsInputs(Request $request)
    // {
    //         global  $global_count_names;
    //     // Get selected constant ID from the dropdown
    //     $const_id = $request->input('selected_const_id');

    //     $constant = Constant::where('const_id', $const_id)->first();

    //     $column_names = explode('-', $constant->col_name);
    //         $global_count_names = $column_names;
    //     // Loop through the column names and create the corresponding labels and inputs
    //     $labels_inputs = "";
    //     foreach ($column_names as $column_name) {
    //         if ($column_name !== null && $column_name !== "") {
    //             // Create the label
    //             $labels_inputs .= "<label for='$column_name'>$column_name:</label>";

    //             // Create the input
    //             $labels_inputs .= "<input type='number' step=any min=0 name='key_value[]' class='form-control'><br>";
    //         }
    //     }
    //         // return response()->json(['labels_inputs' => $labels_inputs]);

    //         return $labels_inputs;
    //     }



    public function getLabelsInputs(Request $request)
    {
        global $global_count_names;

        // Get selected constant ID from the dropdown
        $const_id = $request->input('selected_const_id');

        $constant = Constant::where('const_id', $const_id)->first();

        $column_names = explode('-', $constant->col_name);
        $global_count_names = $column_names;

        // Loop through the column names and create the corresponding labels and inputs
        $labels_inputs = "";
        $index = 0;
        foreach ($column_names as $column_name) {
            if ($column_name !== null && $column_name !== "") {
                // Create the label
                $labels_inputs .= "<label for='$column_name'>$column_name:</label>";

                // Create the input
                $labels_inputs .= "<input type='number' step=any min=0 name='key_value[$index]' class='form-control'><br>";

                $index++;
            }
        }

        return $labels_inputs;
    }
}
