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
use App\Models\User;
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

Route::get('/teest', function () {
    Constant::where('const_id', 2)
    ->update(['col_name' => 'النسبة لكل سرير']);
    // $const = Constant::find(2);
    // $const->col_name = 'النسبة لكل سرير';
});
Route::get('/test', function () {
    // $constant = Constant::whereNotNull('COL_NAME')->get();
    // dd($constant[4]['col_name'], explode("-", $constant[4]['col_name']));

    $managment = Managment::whereNull('TB_MANAGMENT_PARENT')->get();
    $managment = Managment::where('TB_MANAGMENT_PARENT', 1398)->get();
    $keys = Key::all();
    $constans = Constant::all();
    $selectedIds = Managment::all();
    $results_show = SaveResult::all();
    $classifications = Classification::all();
    $users = User::all();

    $roles = EmployeeRole::all();
    $constant = Constant::all();
    dd($keys);
    //  dd($users);
    // dd($managment);
    // dd($keys);
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



    Route::view('parent', 'cms.parent')->name('cms.parent');
    Route::view('/', 'cms.homepage')->name('cms.homepage');
    Route::resource('employeeroles', EmployeeRoleController::class);
    Route::resource('key', KeyController::class);
    Route::resource('keycalc', KeyCalculateController::class);
    Route::resource('constant', ConstantController::class);

    //view the results page
    //Result Final Resource Route
    Route::resource('results', SaveResultController::class);

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

    Route::get('getLabelsInputs', [KeyController::class, 'getLabelsInputs'])->name('getLabelsInputs');

    //get employee  departments
    Route::get('getEmployeeDepartments', [EmployeeController::class, 'getEmployeeDepartments'])->name('getEmployeeDepartments');

    Route::get('logout', [UserAuthController::class, 'logout'])->name('cms.logout');

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

});


