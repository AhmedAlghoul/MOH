<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DoctorsController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\NurseController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\KeyController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\RoleController;
use App\Models\KeyCalculate;
use Database\Factories\DepartmentFactory;
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

Route::prefix('cms/admin')->middleware('auth:admin')->group(function () {

    Route::view('register', 'cms.register')->name('cms.register');
    Route::view('parent', 'cms.parent')->name('cms.parent');
    Route::view('/', 'cms.dashboard')->name('cms.dashboard');
    Route::resource('nurse', NurseController::class);
    Route::resource('hospital', HospitalController::class);
    Route::resource('department', DepartmentController::class);
    Route::resource('role', RoleController::class);
    Route::resource('key', KeyController::class);
    Route::resource('employee', EmployeeController::class);
    Route::resource('keycalc', KeyCalculate::class);
    Route::view('keycalc', 'cms.keycalc.form')->name('cms.keycalc');
    Route::view('nursecalc', 'cms.keycalc.nursecalc')->name('nursecalc');
    Route::view('physicaltherapycalc', 'cms.keycalc.physicaltherapycalc')->name('physicaltherapycalc');
    Route::view('medicalimagingcalc', 'cms.keycalc.medicalimagingcalc')->name('medicalimagingcalc');
    Route::view('pharmacycalc', 'cms.keycalc.pharmacycalc')->name('pharmacycalc');
    Route::view('laboratorycalc', 'cms.keycalc.laboratorycalc')->name('laboratorycalc');
    Route::view('doctorcalc', 'cms.keycalc.doctorcalc')->name('doctorcalc');
    Route::view('administrativecalc', 'cms.keycalc.administrativecalc')->name('administrativecalc');
    Route::view('calc', 'cms.nurses.calculate')->name('cms.nurses.calculate');
    Route::get('logout', [UserAuthController::class, 'logout'])->name('cms.logout');
    //nurses key index and create key views
    Route::view('nurseskey', 'cms.nurses.key')->name('cms.nurseskey');
    Route::view('/addnurseskey', 'cms.nurses.addkey')->name('cms.addnurseskey');
    //laravel excel
    Route::get('file-import-export', [EmployeeController::class, 'fileImportExport']);
    Route::post('file-import', [EmployeeController::class, 'fileImport'])->name('file-import');
    Route::get('file-export', [EmployeeController::class, 'fileExport'])->name('file-export');
});
