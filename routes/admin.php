<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DoctorsController;
use App\Http\Controllers\NurseController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\UserAuthController;
use Database\Factories\DepartmentFactory;
use Illuminate\Support\Facades\Route;





//     //route wit text hello to login page
//     Route::get('login', 'cms.login')->name('cms.login');


// //write route with prefix and middleware and group 

// Route::prefix('admin')->middleware('auth:admin')->group(function () {
//     route::view('/', 'cms.homepage')->name('cms.homepage');
// });
