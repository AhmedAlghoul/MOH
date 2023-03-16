<?php

use App\Http\Controllers\AdministrativecalcController;
use App\Http\Controllers\CircleController;
use App\Http\Controllers\ConstantController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DoctorCalcController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeRoleController;
use App\Http\Controllers\FacilityResultController;
use App\Http\Controllers\GetCountController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\KeyCalculateController;
use App\Http\Controllers\KeyController;
use App\Http\Controllers\LaboratorycalcController;
use App\Http\Controllers\MedicalimagingcalcController;
use App\Http\Controllers\NursecalcController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PharmacycalcController;
use App\Http\Controllers\PhysicaltherapycalcController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\SaveResultController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPermissionController;
use App\Models\Classification;
use App\Models\Constant;
use App\Models\Department;
use App\Models\EmployeeRole;
use App\Models\Key;
use App\Models\Managment;
use App\Models\SaveResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('getToken', [GetCountController::class, 'getToken'])->name('getToken');
Route::get('getCount', [GetCountController::class, 'getCount'])->name('getCount');

Route::get('/test', function () {
    // $managment = Managment::whereNull('TB_MANAGMENT_PARENT')->get();
    $managment = Managment::where('TB_MANAGMENT_PARENT', 1398)->get();
    $keys = Key::all();
    $constans = Constant::all();
    $selectedIds = Managment::all();
    $results_show = SaveResult::all();
    $classifications = Classification::all();

    $roles = EmployeeRole::all();
    // $constant = Constant::all();
    // dd($constans);
    // dd($managment);
    dd($keys);
    // dd($classifications);
    // dd($managment);
    // dd($roles);
    // dd($results_show);
});

Route::prefix('cms/admin')->middleware('guest:web')->group(function () {
    Route::get('login', [UserAuthController::class, 'showLogin'])->name('cms.login');
    Route::post('login', [UserAuthController::class, 'login'])->name('cms.post.login');
});

//route get with middleware
Route::get('/', [UserAuthController::class, 'showLogin']);

//auth:(guardname)
Route::prefix('cms/admin')->middleware('auth:web')->group(function () {
    Route::view('test', 'cms.viewkeyCalcResult.doctorCalcResult')->name('test');

    Route::view('register', 'cms.register')->name('cms.register');
    Route::view('parent', 'cms.parent')->name('cms.parent');
    Route::view('/', 'cms.homepage')->name('cms.homepage');
    Route::get('delete/{id}', [HospitalController::class, 'destroy'])->name('hospital.delete');
    Route::resource('hospital', HospitalController::class);
    Route::resource('department', DepartmentController::class);
    Route::resource('employeeroles', EmployeeRoleController::class);
    Route::resource('key', KeyController::class);
    Route::resource('employee', EmployeeController::class);
    Route::resource('keycalc', KeyCalculateController::class);
    Route::resource('circle', CircleController::class);
    Route::resource('pharmacy', PharmacycalcController::class);
    Route::resource('Laboratry', LaboratorycalcController::class);
    Route::resource('phiscaltherapist', PhysicaltherapycalcController::class);
    Route::resource('medicalimaging', MedicalimagingcalcController::class);
    Route::resource('administratives', AdministrativecalcController::class);
    Route::resource('facilityresult', FacilityResultController::class);
    Route::resource('constant', ConstantController::class);
    //view the facility result page
    Route::view('facilityresult', 'cms.viewkeyCalcResult.facilityResult')->name('facilityresult');
    //view the results page
    //Result Final Resource Route
    Route::resource('results', SaveResultController::class);
    // Route::post('/results', [SaveResultController::class, 'store']);
    // Route::view('results', 'cms.Results')->name('Results');

    //get job role route
    Route::get('getEmployeeRole', [KeyCalculateController::class, 'getEmployeeRole'])->name('keycalc.getEmployeeRole');

    //get departments route
    Route::get('getDepartments', [KeyCalculateController::class, 'getDepartments'])->name('getDepartments');
    //check the drop down value
    Route::get('checkvalue', [KeyCalculateController::class, 'checkvalue'])->name('checkvalue');
    //populate treeview
    Route::get('treeview', [KeyCalculateController::class, 'treeview'])->name('treeview');
   //Get Row Data
   Route::post('getRowData',[SaveResultController::class, 'getRowData'])->name('getRowData');
    //Get Data of dropdown
    Route::get('getData', [KeyController::class, 'getData'])->name('getData');
    //get employee  departments
    Route::get('getEmployeeDepartments', [EmployeeController::class, 'getEmployeeDepartments'])->name('getEmployeeDepartments');
    //nurse calculate route
    Route::post('nurseCalculate', [KeyCalculateController::class, 'nurseCalculate'])->name('nurseCalculate');
    //pharmacist calculate route
    Route::post('pharmacyCalculate', [KeyCalculateController::class, 'pharmacyCalculate'])->name('pharmacyCalculate');
    //physical therapists calculate Route
    Route::post('physicaltherapistcalc', [KeyCalculateController::class, 'physicaltherapistcalc'])->name('physicaltherapistcalc');
    //laboratory technicians calculate Route
    Route::post('laboratorytechnicianscalc', [KeyCalculateController::class, 'laboratorytechnicianscalc'])->name('laboratorytechnicianscalc');
    //medicalimaging calculate route
    Route::post('medicalimagingcalc', [KeyCalculateController::class, 'medicalimagingcalc'])->name('medicalimagingcalc');
    //administrative calculate route
    Route::post('administrativecalculation', [KeyCalculateController::class, 'administrativecalculation'])->name('administrativecalculation');



    // employee role calculations
    Route::view('nursecalc', 'cms.keycalc.nursecalc')->name('nursecalc');
    Route::view('physicaltherapycalc', 'cms.keycalc.physicaltherapycalc')->name('physicaltherapycalc');
    // Route::view('medicalimagingcalc', 'cms.keycalc.medicalimagingcalc')->name('medicalimagingcalc');
    Route::view('pharmacycalc', 'cms.keycalc.pharmacycalc')->name('pharmacycalc');
    Route::view('laboratorycalc', 'cms.keycalc.laboratorycalc')->name('laboratorycalc');
    Route::resource('doctors', DoctorCalcController::class);
    Route::resource('nurses', NursecalcController::class);
    Route::view('doctorcalc', 'cms.doctorcalc.doctorcalc')->name('doctorcalc');
    // Route::view('')->name('');
    Route::view('doctorsecond', 'cms.keycalc.doctorsecond')->name('doctorsecond');
    Route::view('administrativecalc', 'cms.keycalc.administrativecalc')->name('administrativecalc');
    Route::view('calc', 'cms.nurses.calculate')->name('cms.nurses.calculate');
    Route::view('expand', 'cms.expandabletable')->name('cms.expand');
    Route::get('logout', [UserAuthController::class, 'logout'])->name('cms.logout');
    //nurses key index and create key views
    Route::view('nurseskey', 'cms.nurses.key')->name('cms.nurseskey');
    Route::view('/addnurseskey', 'cms.nurses.addkey')->name('cms.addnurseskey');
    //==================temporary route===============
    Route::view('/keycalculatemethod', 'cms.keycalculatemethod.form')->name('keycalculatemethod');

    ################start of system users and user permissions Route ############

    Route::resource('users', UserController::class);
    Route::resource('user.permisions', UserPermissionController::class);
    Route::resource('role.permissions', RolePermissionController::class);
    //spatie roles and permissions
    route::resource('roles', RoleController::class);
    route::resource('permissions', PermissionController::class);
    ################End of system users and user permissions Route ############


    //change password routes
    Route::get('/changepassword', [UserAuthController::class, 'changePassword'])->name('cms.changepassword');
    Route::post('/changepassword', [UserAuthController::class, 'updatePassword'])->name('cms.updatepassword');


    ####################beginning of Laravel Excel ####################################
    //excel fiels imports and exports for employees
    Route::get('file-import-export', [EmployeeController::class, 'fileImportExport']);
    Route::post('file-import', [EmployeeController::class, 'fileImport'])->name('file-import');
    Route::get('file-export', [EmployeeController::class, 'fileExport'])->name('file-export');

    //export excel file for departments id
    Route::get('/departments/export', [DepartmentController::class, 'export'])->name('departmentsexport');

    //export excel file for hospitals id
    Route::get('/hospitals/export', [HospitalController::class, 'export'])->name('hospitlasexport');

    //export excel file for employee roles id
    Route::get('/employeerole/export', [EmployeeRoleController::class, 'export'])->name('employeerolesexport');

    //export excel file for circles id
    Route::get('/circles/export', [CircleController::class, 'export'])->name('circlesexport');



    //downlad sample excel file
    Route::get('/download', function () {
        $file = public_path() . "/download/template.xlsx";

        $headers = array(
            'Content-Type: application/xlsx',
        );
        return response()->download($file, "template.xlsx", $headers);
    });
    ####################End of Laravel Excel ###########################################
});

#####################Begin Ajax Routes###########################


//

####################End Ajax Routes##############################
