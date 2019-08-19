<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class LoginController extends Controller
{
    //

    public  function getLogin(){
    	return view('backend.login');
    }

    public  function postLogin(Request $request){
    	// kiem tra dang nhap
    	$arr =['email'=>$request->email,'password'=>$request->password];

    	// lam chuc nang remberme
    	if($request->remember='Remember Me'){
    		$remember=true;
    	}else{
    		$remember=false;
    	}

    	if(Auth::attempt($arr,$remember)){
    		return redirect()->intended('admin/home');


    	}else{
    		return back()->withInput()->with('error','Đăng nhập thất bại');
    	}
    }
}
