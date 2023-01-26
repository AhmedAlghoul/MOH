<?php

namespace App\Http\Controllers;

use App\Models\Administrativecalc;
use App\Models\circle;
use App\Models\Constant;
use App\Models\KeyCalculate;
use App\Models\Hospital;
use App\Models\Department;
use App\Models\DoctorCalc;
use App\Models\Employee;
use App\Models\EmployeeRole;
use App\Models\HospitalDepartment;
use App\Models\Key;
use App\Models\Laboratorycalc;
use App\Models\Managment;
use App\Models\Medicalimagingcalc;
use App\Models\Pharmacycalc;
use App\Models\Physicaltherapycalc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Psy\Readline\Hoa\Console;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;

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
        $hospitals = Hospital::all();
        // $circles = circle::all();
        $employeeroles = EmployeeRole::all();
        $key_calculates = KeyCalculate::all();
        return view('cms.keycalc.index', compact('key_calculates', 'hospitals', 'employeeroles'));
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
        $managments = Managment::whereNull('TB_MANAGMENT_PARENT')->get();

        return response()->view('cms.keycalc.form', compact('hospitals', 'departments', 'roles', 'managments'));
    }

    /**
     *  a newly created resource in storage.
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
        $departments_id = [];
        $departments_name = [];
        foreach ($departments as $department) {
            $departments_name[] = $department->departments->name;
        }

        //return response of departments name
        // return response()->view('cms.keycalc.form', compact('departments_name'));
        return response()->json($departments_name);
    }


    public function getEmployeeRole(Request $request)
    {
        // dd(Request()->all());
        $hospital_name = Hospital::where("id", '=', $request->hospital)->first()->{'name'};
        $hospital_id = Hospital::where("id", '=', $request->hospital)->first()->{'id'};
        $employee_role = EmployeeRole::where("Role_name", $_REQUEST['role'])->pluck('Role_name')->first();
        $department = Department::where("name", $_REQUEST['department'])->pluck('name')->first();
        $department_id = Department::where("name", $_REQUEST['department'])->pluck('id')->first();
        if ($employee_role == "طبيب") {
            $doctors = Employee::where("hospital_id", $hospital_id)->where("department_id", $department_id)->where("role_id", 1)->count();
            //get the foriegn id of department

            $departments = Department::where('is_active', 1)->get();
            $hospitals = Hospital::all();


            // $role_name =EmployeeRole::where("Role_name")->pluck('Role_name')->first();
            $role_id = EmployeeRole::where("Role_name", $employee_role)->pluck('id')->first();
            $department_id = Department::where("name", $department)->pluck('id')->first();
            $key = Key::where("department_id", $department_id)->where('role_id', $role_id)->first('key_value');
            $doctor_count = Employee::where('role_id', $role_id)->where('department_id', $department_id)->count();
            return response()->view('cms.doctorcalc.doctorcalc', compact(['department', 'key', 'role_id', 'employee_role', 'doctor_count', 'hospital_name', 'hospitals', 'departments']));
            //get department name and show it in view of doctor
            // $docotr = Doctor::find(1);
            // if($doctor->delete()){
            //     $caleck = DoctorCalc::wherre('dept_id',$doctor->depetament->id)->first();
            //     $caleck->update([
            //         'count' => $caleck->doctor_count - 1
            //     ]);
            // }
            // $employee_role=$request->role;
            // $role = Role::where('name', $employee_role)->first();

        } elseif (
            $employee_role == "ممرض" || $employee_role == "ممرضة"
        ) {

            $role_id = EmployeeRole::where("Role_name", $employee_role)->pluck('id')->first();
            $department_id = Department::where("name", $department)->pluck('id')->first();
            $key = Key::where("department_id", $department_id)->where('role_id', $role_id)->first('key_value');
            $nurse_count = Employee::where('role_id', $role_id)->where('department_id', $department_id)->count();
            return response()->view('cms.keycalc.nursecalc', compact(['department', 'nurse_count', 'key', 'role_id', 'hospital_id', 'department_id', 'hospital_name']));
        } elseif ($employee_role == "صيدلي") {

            $role_id = EmployeeRole::where("Role_name", $employee_role)->pluck('id')->first();
            $department_id = Department::where("name", $department)->pluck('id')->first();
            $key = Key::where("department_id", $department_id)->where('role_id', $role_id)->first('key_value');
            $pharmacist_count = Employee::where('role_id', $role_id)->where('department_id', $department_id)->count();
            return response()->view('cms.keycalc.pharmacycalc', compact(['department', 'pharmacist_count', 'key', 'hospital_name']));
        } elseif ($employee_role == "فني علاج طبيعي" || $employee_role == "معالج طبيعي" || $employee_role == "أخصائي علاج طبيعي") {

            $role_id = EmployeeRole::where("Role_name", $employee_role)->pluck('id')->first();
            $department_id = Department::where("name", $department)->pluck('id')->first();
            $physical_therapist_count = Employee::where('role_id', $role_id)->where('department_id', $department_id)->count();

            return response()->view('cms.keycalc.physicaltherapycalc', compact(['department', 'role_id', 'physical_therapist_count', 'hospital_name']));
        } elseif ($employee_role == "فني مختبر") {
            $role_id = EmployeeRole::where("Role_name", $employee_role)->pluck('id')->first();
            $department_id = Department::where("name", $department)->pluck('id')->first();
            $laboratory_technicians_count = Employee::where('role_id', $role_id)->where('department_id', $department_id)->count();

            return response()->view('cms.keycalc.laboratorycalc', compact(['role_id', 'department_id', 'laboratory_technicians_count', 'department', 'hospital_name']));
        } elseif ($employee_role == "أمن" || $employee_role == "محاسب" || $employee_role == "اداري" || $employee_role == "إداري جامعي" || $employee_role == "آذن و مراسل" || $employee_role == "امين مخزن" || $employee_role == "حارس" || $employee_role == "خدمات" || $employee_role == "رئيس قسم اداري" || $employee_role == "رئيس شعبة اداري" || $employee_role == "سكرتاريا طبية" || $employee_role == "سكرتاريا دبلوم" || $employee_role == "عامل" || $employee_role == "علاقات عامة و اعلام" || $employee_role == "فني صيانة" || $employee_role == "فني" || $employee_role == "كاتب" || $employee_role == "كاتب جامعي" || $employee_role == "كاتب ثانوي" || $employee_role == "كاتب دبلوم" || $employee_role == "مدير اداري" || $employee_role == "مساعد اداري") {

            $role_id = EmployeeRole::where("Role_name", $employee_role)->pluck('id')->first();
            $department_id = Department::where("name", $department)->pluck('id')->first();
            $administrative_count = Employee::where('role_id', $role_id)->where('department_id', $department_id)->count();

            return response()->view('cms.keycalc.administrativecalc', compact(['department', 'employee_role', 'administrative_count', 'hospital_name']));
        } elseif ($employee_role == "فني أشعة") {

            $role_id = EmployeeRole::where("Role_name", $employee_role)->pluck('id')->first();
            $department_id = Department::where("name", $department)->pluck('id')->first();
            $ray_technician_count = Employee::where('role_id', $role_id)->where('department_id', $department_id)->count();
            // $calculationOfRayTechnicains =
            return response()->view('cms.keycalc.medicalimagingcalc', compact(['department', 'ray_technician_count', 'hospital_name']));
        }
    }
    public function nurseCalculate(Request $request)
    {


        $hospital_name = $request->input('hospital_name');

        $department = $request->input('department');

        $department_id = $request->input('department_id');
        $nurse_count = $request->input('nurse_count');
        $key_value = $request->input('key_value');
        $bed_count = $request->input('bed_count');
        $need = round($key_value * $bed_count);
        $result = round($nurse_count  - $need);

        $flag = 1;
        return response()->view('cms.keycalc.nursecalc', compact(['result', 'need', 'department', 'flag', 'nurse_count', 'key_value', 'bed_count', 'department_id', 'hospital_name']));
    }
    // public function doctorCalculate(Request $request)
    // {
    //     $monthly_hours = $request->input('monthly_hours');
    //     $key_value = $request->input('key_value');
    //     $doctor_count = $request->input('doctor_count');
    //     $result = round($monthly_hours / $key_value);

    //     return response()->view('doctorcalc.index', compact(['result', 'monthly_hours', 'key_value', 'doctor_count']));
    // }

    public function pharmacyCalculate(Request $request)
    {
        $hospital_name = $request->input('hospital_name');
        $department = $request->input('department');
        $pharmacist_count = $request->input('pharmacist_count');
        $key_value = $request->input('key_value');
        $number_of_prescriptions = $request->input('number_of_prescriptions');
        $number_of_medical_reports = $request->input('number_of_medical_reports');
        $result = 0;

        //if condition if $number_of_prescriptions <=1400 and bigger than 0


        if ($number_of_prescriptions <= 1100 && $number_of_prescriptions > 0) {
            $result += 1;
        } elseif ($number_of_prescriptions > 1100) {
            $number_of_prescriptions = $number_of_prescriptions - 1100;
            $add_amount = floor($number_of_prescriptions / 1000);
            $add_amount  ? $result += $add_amount + 1  : $result += $add_amount + 1;
        };

        if ($number_of_medical_reports <= 320 && $number_of_medical_reports > 0) {
            $result += 1;
        } elseif ($number_of_medical_reports > 320) {
            $number_of_medical_reports = $number_of_medical_reports - 320;
            $add_amount = floor($number_of_medical_reports / 300);
            $add_amount  ? $result += $add_amount : $result += $add_amount + 1;
        }
        $flag = 1;
        $need = ($pharmacist_count - $result);
        return response()->view('cms.keycalc.pharmacycalc', compact(['department', 'flag', 'pharmacist_count', 'number_of_prescriptions', 'number_of_medical_reports', 'result', 'key_value', 'need', 'hospital_name']));
    }

    public function physicaltherapistcalc(Request $request)
    {
        $hospital_name = $request->input('hospital_name');
        $number_of_sessions = $request->input('number_of_sessions');
        $department = $request->input('department');
        $physical_therapist_count = $request->input('physical_therapist_count');
        $session_duration = $request->input('session_duration');
        $working_minutes_per_day = $request->input('working_minutes_per_day');
        $working_days = $request->input('working_days');
        $result = ($number_of_sessions * $session_duration) / ($working_minutes_per_day * $working_days);
        $need = $result - $physical_therapist_count;
        $flag = 1;
        return response()->view('cms.keycalc.physicaltherapycalc', compact(['flag',  'department', 'number_of_sessions', 'result', 'need', 'physical_therapist_count', 'hospital_name']));
    }
    public function laboratorytechnicianscalc(Request $request)
    {
        $hospital_name = $request->input('hospital_name');
        $number_of_examinations = $request->input('number_of_examinations');
        $department = $request->input('department');
        $laboratory_technicians_count = $request->input('laboratory_technicians_count');
        $examination_time = $request->input('examination_time');
        $working_minutes_per_day = $request->input('working_minutes_per_day');
        $working_days = $request->input('working_days');
        $result = ($number_of_examinations * $examination_time) / ($working_minutes_per_day * $working_days);
        $need = $result - $laboratory_technicians_count;
        $flag = 1;
        return response()->view('cms.keycalc.laboratorycalc', compact(['department', 'flag', 'result', 'need', 'laboratory_technicians_count', 'hospital_name', 'laboratory_technicians_count', 'number_of_examinations']));
    }

    public function medicalimagingcalc(Request $request)
    {
        $hospital_name = $request->input('hospital_name');
        $department = $request->input('department');
        $ray_technician_count = $request->input('ray_technician_count');
        $x_rays = $request->input('x_rays');
        //request xrays input value from form
        $Fluoroscopy = $request->input('Fluoroscopy');
        $ct_scan = $request->input('ct_scan');
        $mri = $request->input('mri');
        $result = ($x_rays * 2) + ($Fluoroscopy * 2) + ($ct_scan * 3) + ($mri * 3);
        $need = $ray_technician_count - $result;
        $flag = 1;
        return response()->view('cms.keycalc.medicalimagingcalc', compact(['department', 'ray_technician_count', 'flag', 'x_rays', 'Fluoroscopy', 'ct_scan', 'mri', 'result', 'need', 'hospital_name']));
    }

    public function administrativecalculation(Request $request)
    {
        $hospital_name = $request->input('hospital_name');
        $employee_role = $request->input('employee_role');
        $department = $request->input('department');
        $administrative_count = $request->input('administrative_count');
        $seven_hours = $request->input('seven_hours');
        $twenty_four_hours = $request->input('twenty_four_hours');
        $result = ($seven_hours * 1) + ($twenty_four_hours * 6);
        $need = $administrative_count - $result;
        $flag = 1;
        return response()->view('cms.keycalc.administrativecalc', compact(['department', 'administrative_count', 'flag', 'seven_hours', 'twenty_four_hours', 'result', 'need', 'hospital_name', 'employee_role']));
    }
    public function saveDoctors(Request $request)
    {
    }

    // public function checkvalue(Request $request)
    // {
    //     // return $request->managmentCode;
    //     $NextDropDowns = Managment::where("TB_MANAGMENT_PARENT", $request->managmentCode)->select(['tb_managment_code', 'tb_managment_name'])->get();

    //     return response()->json([
    //         'status' => true,
    //         'newData' => $NextDropDowns,
    //     ]);
    // }

    public function checkvalue(Request $request)
    {
        $Labelsresult = Key::where('role_id', '=', $request->roleChoice)->select('department_id', 'key_value', 'calc_type_id')->get();
        return response()->json($Labelsresult);
        

    }

    public function treeview($select = null)
    {
        $trees = Managment::whereNull('TB_MANAGMENT_PARENT')->where('tb_managment_code', '!=', 0)->select(['tb_managment_code', 'tb_managment_name'])->get();

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
