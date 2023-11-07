<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Helpers\AppHelper;

class LoginController extends Controller
{
    public function login()
    {
        return view('back.auth.login');
    }
    public function loginPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|exists:users',
            'password' => 'required|min:6',
        ]);
        if ($validator->fails()) {
            return AppHelper::ajaxResponse("Validation Errors", "fail", [], $validator->errors(), 403);
        }
        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        $remember_me = false;
        if ($request->remember && $request->remember == 'on') {
            $remember_me = true;
        }
        $auth = Auth::attempt($data, $remember_me);
        $user = Auth::user();
      
        if (isset($user) && $user->user_type == 'admin' && $auth) {
            $request->session()->regenerate();
            return AppHelper::ajaxResponse("Authentication Successfully", "success", [], [], 200);
        } else {
            Auth::logout(); 
            return AppHelper::ajaxResponse("Authentication Failed", "fail", [], ['password' => ['Invalid Credientials']], 401);
        }
    }
    public function logoutPost()
    {
        Auth::logout(); 
        return redirect()->route('back.login');
    }
}
