<?php

namespace App\Http\Controllers;

use App\Models\KeyCalculate;
use App\Models\Hospital;
use App\Models\Department;
use App\Models\EmployeeRole;
use App\Models\HospitalDepartment;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KeyCalculateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('cms.keycalc.nursecalc');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hospitals = Hospital::all();
        $hospital_departments = Department::all();
        $departments = Department::all();
        $roles = EmployeeRole::all();
        return response()->view('cms.keycalc.form', compact('hospitals', 'departments', 'roles'));
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

    // public function getDepartments($id)
    // {
    //     $hospitals = DB::table("hospitals_departments")->where("hospital_id", $id)->pluck("Product_name", "id");
    //     return json_encode($hospitals);
    // }

    public function getDepartments()
    {
        // get hospital due to id of hospital
        // echo "AHMED";
        // echo $_REQUEST['hospital_id'];
        // die;

        $hospital = Hospital::find($_REQUEST['hospital_id']);
        //get departments of hospital

        $departments = HospitalDepartment::where("hospital_id", $_REQUEST['hospital_id'])->get();

        //for loop in departments to get name of department
        $departments_name = [];
        foreach ($departments as $department) {
            $departments_name[] = $department->departments->name;
        }
       //return json of departments name
        return response()->json($departments_name);
    }

    public function getEmployeeRole(Request $request){
        //get employee role name and see if it equal to values  to redirect to view

        $employee_role = EmployeeRole::where("Role_name", $_REQUEST['role'])->pluck('Role_name')->first();
        if($employee_role == "طبيب"){
            return response()->view('cms.keycalc.doctorcalc');
        }else if($employee_role == "ممرض"){
             return response()->view('cms.keycalc.nursecalc');
        }}

    //write get departments function
    // public function getDepartments($id)
    // {
    //     // $departments = Department::where('hospital_id', $id)->get();
    //     // return response()->json($departments);
    // }



}
