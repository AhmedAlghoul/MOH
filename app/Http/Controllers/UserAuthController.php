<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
            return redirect()->route('cms.homepage');
        }
        // notify()->error('خطا في البيانات  برجاء المجاولة مجدا ');
        return redirect()->back()->with(['error' => 'هناك خطأ بالبيانات']);


        // );
        // if(!$validator->fails()){
        //     if(Auth::guard('web')->attempt([id_number => $request->id_number, password => $request->password])){
        //         return redirect()->route('cms.homepage');
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
    //reset password for admin using the past password and new password
    // public function resetPassword(Request $request)
    // {
    //     $request->validate(
    //         [
    //             'old_password' => 'required',
    //             'new_password' => 'required|min:6'
    //         ],
    //         [
    //             'old_password.required' => 'الرجاء إدخال كلمة المرور القديمة',
    //             'new_password.required' => 'الرجاء إدخال كلمة المرور الجديدة',
    //             'new_password.min' => 'كلمة المرور يجب أن تكون أكثر من 6 أحرف'
    //         ]

    //     );
    //     $user = Auth::guard('admin')->user();
    //     if (Hash::check($request->old_password, $user->password)) {
    //         $user->password = Hash::make($request->new_password);
    //         $user->save();
    //         return redirect()->back()->with('success', 'تم تغيير كلمة المرور بنجاح');
    //     } else {
    //         return redirect()->back()->with('error', 'كلمة المرور القديمة غير صحيحة');
    //     }
    // }
    
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        return redirect()->route('cms.login');
    }
}
