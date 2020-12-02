<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function getLogin()
    {
        return view('auth.login');
    }
    public function postLogin(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $login = Auth::attempt([
            'username'=>$username,
            'password'=>$password,
        ]);
        if($login){
            return redirect()->route('admin.news.index');
        }else{
            return redirect()->route('auth.login')->with('msg',"Sai username hoac mat khau");
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.login');
    } 
    public function getLoginPublic()
    {
        return view('auth.login');
    }
    public function postLoginPublic(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $login = Auth::attempt([
            'username'=>$username,
            'password'=>$password,
        ]);
        if($login){
            return redirect()->route('cland.news.index');
        }else{
            return redirect()->route('auth.login')->with('msg',"Sai username hoac mat khau");
        }
    }
}