<?php

use App\Http\Controllers\DoctorsController;
use App\Http\Controllers\NurseController;
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

Route::prefix('cms/admin')->group(function () {
    Route::view('login', 'cms.login');
    Route::view('register', 'cms.register');
    Route::view('parent', 'cms.parent')->name('cms.parent');
    Route::view('form', 'cms.doctors.form');
    Route::view('doctor', 'cms.doctors.index');
    Route::view('/', 'cms.dashboard')->name('cms.dashboard');
    Route::resource('doctor', DoctorsController::class);
    Route::resource('nurse', NurseController::class);
});

Route::get('/', function () {
    return view('cms.login');
});
