<?php

namespace App\Http\Controllers;

use App\Exports\HospitalsExport;
use App\Models\Department;
use App\Models\Hospital;
use App\Models\HospitalDepartment;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class HospitalController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index', 'show']]);
    //     $this->middleware('permission:product-create', ['only' => ['create', 'store']]);
    //     $this->middleware('permission:product-edit', ['only' => ['edit', 'update']]);
    //     $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    // }

    //        $permissions = Permission::pluck('id')->toArray();

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $hospitals = Hospital::get();
        return view('cms.Hospitals.index', compact('hospitals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $departments = Department::where('is_active', 1)->get();

        return response()->view('cms.Hospitals.form', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        //validate data

        // $request->validate(
        //     [
        //         'hospital_name' => 'required',
        //         'department[]' => 'required',
        //     ],
        //     [
        //         'hospital_name.required' => 'الرجاء إدخال اسم المستشفى',
        //         'department.required' => 'الرجاء إختيار الأقسام',
        //     ]
        // );
        //create validation rules for the name of hospital to be unique in the database

        //to be contintued (revise the validation rules)

        // $request->validate(
        //     [
        //         'name' => 'required|unique:hospitals',
        //     ],
        //     [
        //         'name.required' => 'الرجاء إدخال اسم المستشفى',
        //         'name.unique' => 'هذا المستشفى موجود بالفعل',
        //     ]
        // );

        $hospital = new Hospital();
        $hospital->name = $request->hospital_name;
        $hospital->save();
        $hospital->departments()->attach($request->department);
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

        $hospital = Hospital::findOrFail($id);
        //get all selected departments and return it to array
        $department = $hospital->departments()->get();
        $all_departments = Department::where('is_active', 1)->get();

        $department_collect = collect();
        foreach ($hospital->departments as $departments) {
            $department_collect[] = $departments;
        }

        //get all departments and return it to array and show it in the form

        // $departments = Department::where('is_active',  1)->get( );

        // $departments_collect = collect();
        // foreach ($departments as $department) {
        //     $departments_collect[] = $department;
        // }

        return response()->view('cms.Hospitals.edit', compact('hospital',   'department', 'department_collect', 'all_departments'));

        // return response()->view('cms.hospitals.edit', compact('hospital', 'department_collect', 'department', 'departments'));
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
        // write function to update hospital and show other departments to select
        $hospital = Hospital::findOrFail($id)->first();
        $hospital->name = $request->hospital_name;
        $hospitaldepartment = HospitalDepartment::where('hospital_id', $id)->get();
        $hospitaldepartment->department_id = $request->department;

        $hospital = Hospital::updateOrCreate([
            'name' => $request->hospital_name,
        ]);

        $hospital->departments()->sync($request->department);
        //redirect to the index page
        return redirect()->route('hospital.index');
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
        $isDestroyed = Hospital::find($id);
        count($isDestroyed->departments);
        if (count($isDestroyed->departments) > 0) {
            //return error message to user that he can't delete this hospital because it has departments in pop up message'

            return redirect()->back()->with('error', 'لا يمكن حذف هذا المرفق لأنه يحتوي على أقسام');
        } else {
            $isDestroyed->delete();
            session()->flash('success', 'تم حذف المرفق بنجاح');
            return redirect()->back();
        }
    }
    public function export()
    {
        return Excel::download(new HospitalsExport, 'hospitals.xlsx');
    }
}

//             return redirect()->back()->with('error', 'لا يمكن حذف هذا المستشفى لوجود أقسام مرتبطة به');
//             // return response()->json(['error' => 'لا يمكن حذف المستشفى لأنه مرتبط بأقسام']);
//         } else {
//             $isDestroyed->delete();
//         }
//     }
// }
