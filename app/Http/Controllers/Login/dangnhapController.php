<?php

namespace App\Http\Controllers\Login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Support\Facades\Auth;

class dangnhapController extends Controller
{
    public function getIn()
    {
    	return view('login.dangnhap');
    }
    public function postIn(Request $request)
    {
    	$user=[
    		'email'=>$request->email,
    		'password'=>$request->password,
    		'level'=>0,
            'status'=>1
    	];
    	if(Auth::attempt($user)){
    		return redirect()->route('danhmuc');
    	}else{
    		return redirect()->back()->withErrors(['Email or password incorect']);
    	}
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('getIn');
    }
}
