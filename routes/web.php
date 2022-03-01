<?php

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

    Route::view('/', 'cms.temp');
});
