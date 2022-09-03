<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DoctorsController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeRoleController;
use App\Http\Controllers\NurseController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\KeyCalculateController;
use App\Http\Controllers\KeyController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\RoleController;
use App\Models\EmployeeRole;
use App\Models\KeyCalculate;
use Database\Factories\DepartmentFactory;
use GuzzleHttp\Psr7\Response;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('cms/parent');
// });




Route::prefix('cms/admin')->middleware('guest:admin')->group(function () {
    Route::get('login', [UserAuthController::class, 'showLogin'])->name('cms.login');
    Route::post('login', [UserAuthController::class, 'login'])->name('cms.post.login');
});

//route get with middleware 
Route::get('/', [UserAuthController::class, 'showLogin']);

//auth:(guardname)
Route::prefix('cms/admin')->middleware('auth:admin')->group(function () {

    Route::view('register', 'cms.register')->name('cms.register');
    Route::view('parent', 'cms.parent')->name('cms.parent');
    Route::view('/', 'cms.homepage')->name('cms.homepage');
    Route::resource('nurse', NurseController::class);
    Route::get('delete/{id}', [HospitalController::class, 'destroy'])->name('hospital.delete');
    Route::resource('hospital', HospitalController::class);
    Route::resource('department', DepartmentController::class);
    Route::resource('employeeroles', EmployeeRoleController::class);
    Route::resource('key', KeyController::class);
    Route::resource('employee', EmployeeController::class);
    Route::resource('keycalc', KeyCalculateController::class);

    //get job role route 
    Route::get('getEmployeeRole', [KeyCalculateController::class, 'getEmployeeRole'])->name('keycalc.getEmployeeRole');

    //get departments route 
    Route::get('getDepartments', [KeyCalculateController::class, 'getDepartments'])->name('keycalc.getDepartments');
    // Route::get('hospital/{id}', [KeyCalculateController::class, 'getDepartments'])->name('keycalc.getDepartments');
    Route::view('nursecalc', 'cms.keycalc.nursecalc')->name('nursecalc');
    Route::view('physicaltherapycalc', 'cms.keycalc.physicaltherapycalc')->name('physicaltherapycalc');
    Route::view('medicalimagingcalc', 'cms.keycalc.medicalimagingcalc')->name('medicalimagingcalc');
    Route::view('pharmacycalc', 'cms.keycalc.pharmacycalc')->name('pharmacycalc');
    Route::view('laboratorycalc', 'cms.keycalc.laboratorycalc')->name('laboratorycalc');

    Route::view('doctorcalc', 'cms.keycalc.doctorcalc')->name('doctorcalc');
    // Route::view('')->name('');
    Route::view('doctorsecond', 'cms.keycalc.doctorsecond')->name('doctorsecond');
    Route::view('administrativecalc', 'cms.keycalc.administrativecalc')->name('administrativecalc');
    Route::view('calc', 'cms.nurses.calculate')->name('cms.nurses.calculate');
    Route::view('expand', 'cms.expandabletable')->name('cms.expand');
    Route::get('logout', [UserAuthController::class, 'logout'])->name('cms.logout');
    //nurses key index and create key views
    Route::view('nurseskey', 'cms.nurses.key')->name('cms.nurseskey');
    Route::view('/addnurseskey', 'cms.nurses.addkey')->name('cms.addnurseskey');


    //laravel excel
    Route::get('file-import-export', [EmployeeController::class, 'fileImportExport']);
    Route::post('file-import', [EmployeeController::class, 'fileImport'])->name('file-import');
    Route::get('file-export', [EmployeeController::class, 'fileExport'])->name('file-export');

    //change password routes
    Route::get('/changepassword', [UserAuthController::class, 'changePassword'])->name('cms.changepassword');
    Route::post('/changepassword', [UserAuthController::class, 'updatePassword'])->name('cms.updatepassword');



    //downlad sample excel file 
    Route::get('/download', function () {
        $file = public_path() . "/download/template.xlsx";

        $headers = array(
            'Content-Type: application/xlsx',
        );
        return response()->download($file, "template.xlsx", $headers);
    });

    //query parameters for department and hospital


    //spatie roles and permissions
    route::resource('roles', RoleController::class);
    route::resource('permissions', PermissionController::class);
});

#####################Begin Ajax Routes###########################


//






####################End Ajax Routes##############################