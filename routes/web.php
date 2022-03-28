<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DoctorsController;
use App\Http\Controllers\NurseController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\UserAuthController;
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
    Route::resource('doctor', DoctorsController::class);
    Route::resource('nurse', NurseController::class);
    Route::resource('hospital', HospitalController::class);
    Route::resource('department', DepartmentController::class);
    Route::get('logout', [UserAuthController::class, 'logout'])->name('cms.logout');
});
