<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RequestLogin;
use App\Models\User;
use Auth;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function postLogin(RequestLogin $request){
        $login = [
            'email' => $request->email,
            'password' => $request->password,
            'is_active' => true,
            'is_delete' => false
        ];

        $remember_me = $request->has('remember')?true:false;

        if (Auth::guard('web')->attempt($login, $remember_me)) {
            $clientIP = request()->ip();
            $user = User::find(Auth::guard('web')->user()->id);
            $user->last_login_ip = $clientIP;
            $user->save();
            return redirect()->route('get.users');
        } else {
            return redirect()->back()->withInput()->withErrors(['password' => 'Mật khẩu không chính xác.',]);
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->back();
    }
}