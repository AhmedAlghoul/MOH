<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserAuthController extends Controller
{
    //
    public function showLogin()
    {
        return view('cms.login');
    }

    public function login(Request $request)
    {

        $request->validate(
            [
                'user_id_number' => 'required',
                'user_password' => 'required|min:6'
            ],
            [
                'user_id_number.required' => ' الرجاء إدخال رقم الهوية المكون من 9 أرقام',
                'user_password.required' => 'الرجاء إدخال كلمة المرور',
                'user_password.min' => 'كلمة المرور يجب أن تكون أكثر من 6 أحرف'
            ]

        );
        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('admin')->attempt(['user_id_number' => $request->user_id_number, 'password' => $request->user_password], $remember_me)) {
            // notify()->success('تم الدخول بنجاح  ');
            return redirect()->route('cms.dashboard');
        }
        // notify()->error('خطا في البيانات  برجاء المجاولة مجدا ');
        return redirect()->back()->with(['error' => 'هناك خطأ بالبيانات']);


        // );
        // if(!$validator->fails()){
        //     if(Auth::guard('web')->attempt([id_number => $request->id_number, password => $request->password])){
        //         return redirect()->route('cms.dashboard');
        //     }
        //     else{
        //         return redirect()->back()->with('error', 'خطأ في إدخال البيانات');
        //     }

        //     }
    }

    public function editProfile()
    {
    }
    public function updateProfile()
    {
    }
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        return redirect()->route('cms.login');
    }
}
