<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\circle;
use App\Models\User;
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
                'id_number.required' => ' الرجاء إدخال رقم الهوية المكون من 9 أرقام',
                'password.required' => 'الرجاء إدخال كلمة المرور',
                'password.min' => 'كلمة المرور يجب أن تكون أكثر من 6 أحرف'
            ]

        );
        $remember_me = $request->has('remember_me') ? true : false;
        if (auth()->guard('web')->attempt(['id_number' => $request->user_id_number, 'password' => $request->user_password], $remember_me)) {
            // Auth::guard('admin')->user()->assignRole('مدير');
            // notify()->success('تم الدخول بنجاح  ');
            $count_circle = circle::count();

            return view('cms.homepage', compact('count_circle'));

            // return redirect()->route('cms.homepage');
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

    public function changePassword()
    {
        return view('cms.changepassword');
    }

    //the password update
    public function updatePassword(Request $request)
    {
        #Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);


        #Match The Old Password
        if (!Hash::check($request->old_password, auth()->user()->user_password)) {
            return back()->with("error", "كلمة المرور القديمة غير مطابقة!");
        }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
        'user_password' => Hash::make($request->new_password)
        ]);

        return back()->with("status", "تم تغيير كلمة المرور بنجاح!");
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
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        return redirect()->route('cms.login');
    }
}
